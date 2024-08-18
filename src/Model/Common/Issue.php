<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Model\Issue\LockReason;
use TK\GitHubWebhook\Model\Issue\AuthorAssociation;
use TK\GitHubWebhook\Model\Issue\PullRequestLite;
use TK\GitHubWebhook\Util;

enum IssueState: string
{
    case OPEN = "open";
    case CLOSED = "closed";
}

/** The [issue](https://docs.github.com/en/rest/reference/issues) itself. */
readonly class Issue
{
    /** URL for the issue */
    public string $url;
    public string $repository_url;
    public string $labels_url;
    public string $comments_url;
    public string $events_url;
    public string $html_url;
    public int $id;
    public string $node_id;
    /** Number uniquely identifying the issue within its repository */
    public int $number;
    /** Title of the issue */
    public string $title;
    public User $user;
    /** @var User[] $assignees */
    public array $assignees;
    public Milestone|null $milestone;
    public int $comments;
    public string $created_at;
    public string $updated_at;
    public string|null $closed_at;
    public AuthorAssociation $author_association;
    public LockReason|null $active_lock_reason;
    /** Contents of the issue */
    public string|null $body;
    public Reactions $reactions;
    public bool|null $draft;
    public App|null $performed_via_github_app;
    /** @var Label[] $labels */
    public array|null $labels;
    /** State of the issue; either 'open' or 'closed' */
    public IssueState|null $state;
    public bool|null $locked;
    public User|null $assignee;
    public PullRequestLite|null $pull_request;
    public string|null $timeline_url;
    /** The reason for the current state */
    public string|null $state_reason;

    public static function fromArray(array $data): Issue
    {
        $instance = new Issue();
        $instance->url = $data["url"];
        $instance->repository_url = $data["repository_url"];
        $instance->labels_url = $data["labels_url"];
        $instance->comments_url = $data["comments_url"];
        $instance->html_url = $data["html_url"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->number = $data["number"];
        $instance->title = $data["title"];
        $instance->user = User::fromArray($data["user"]);
        $instance->assignees = Util::getArray($data, "assignees", User::fromArray(...));
        $instance->milestone = Util::getArgSafe($data, "milestone", Milestone::fromArray(...));
        $instance->comments = $data["comments"];
        $instance->created_at = $data["created_at"];
        $instance->updated_at = $data["updated_at"];
        $instance->closed_at = $data["closed_at"] ?? null;
        $instance->author_association = AuthorAssociation::from($data["author_association"]);
        $instance->active_lock_reason = LockReason::tryFrom($data["active_lock_reason"]);
        $instance->body = $data["body"] ?? null;
        $instance->reactions = Reactions::fromArray($data["reactions"]);
        $instance->draft = $data["draft"] ?? null;
        $instance->performed_via_github_app = Util::getArgSafe($data, "performed_via_github_app", App::fromArray(...));
        $instance->labels = Util::getArraySafe($data, "labels", Label::fromArray(...));
        $instance->state = IssueState::tryFrom($data["state"]);
        $instance->locked = $data["locked"] ?? null;
        $instance->assignee = Util::getArgSafe($data, "assignee", User::fromArray(...));
        $instance->pull_request = Util::getArgSafe($data, "pull_request", PullRequestLite::fromArray(...));
        $instance->timeline_url = $data["timeline_url"] ?? null;
        $instance->state_reason = $data["state_reason"] ?? null;
        return $instance;
    }
}
