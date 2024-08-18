<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Model\Issue\AuthorAssociation;
use TK\GitHubWebhook\Model\PullRequest\AutoMerge;
use TK\GitHubWebhook\Model\PullRequest\Links;
use TK\GitHubWebhook\Model\PullRequest\Target;
use TK\GitHubWebhook\Util;

enum PullRequestState: string
{
    case OPEN = "open";
    case CLOSED = "closed";
}

enum ActiveLockReason: string
{
    case RESOLVED = "resolved";
    case OFF_TOPIC = "off-topic";
    case TOO_HEATED = "too-heated";
    case SPAM = "spam";
}

readonly class PullRequest
{
    public string $url;
    public int $id;
    public string $node_id;
    public string $html_url;
    public string $diff_url;
    public string $patch_url;
    public string $issue_url;
    /** Number uniquely identifying the pull request within its repository. */
    public int $number;
    /** State of this Pull Request. Either `open` or `closed`. */
    public PullRequestState $state;
    public bool $locked;
    /** The title of the pull request. */
    public string $title;
    public User $user;
    public string|null $body;
    public string $created_at;
    public string $updated_at;
    public string|null $closed_at;
    public string|null $merged_at;
    public string|null $merge_commit_sha;
    public User|null $assignee;
    /** @var User[] $assignees */
    public array $assignees;
    /** @var User[]|Team[] $requested_reviewers */
    public array $requested_reviewers;
    /** @var Team[] $requested_teams */
    public array $requested_teams;
    /** @var Label[] $labels */
    public array $labels;
    public Milestone|null $milestone;
    public string $commits_url;
    public string $review_comments_url;
    public string $review_comment_url;
    public string $comments_url;
    public string $statuses_url;
    public Target $head;
    public Target $base;
    public Links $_links;
    public AuthorAssociation $author_association;
    public AutoMerge|null $auto_merge;
    public ActiveLockReason|null $active_lock_reason;
    /** Indicates whether or not the pull request is a draft. */
    public bool $draft;
    public bool|null $merged;
    public bool|null $mergeable;
    public bool|null $rebaseable;
    public string $mergeable_state;
    public User|null $merged_by;
    public int $comments;
    public int $review_comments;
    /** Indicates whether maintainers can modify the pull request. */
    public bool $maintainer_can_modify;
    public int $commits;
    public int $additions;
    public int $deletions;
    public int $changed_files;

    public static function fromArray(array $data): PullRequest
    {
        $instance = new PullRequest();
        $instance->url = $data["url"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->html_url = $data["html_url"];
        $instance->diff_url = $data["diff_url"];
        $instance->patch_url = $data["patch_url"];
        $instance->issue_url = $data["issue_url"];
        $instance->number = $data["number"];
        $instance->state = PullRequestState::from($data["state"]);
        $instance->locked = $data["locked"];
        $instance->title = $data["title"];
        $instance->user = Util::getArgSafe($data, "user", User::fromArray(...));
        $instance->body = $data["body"] ?? null;
        $instance->created_at = $data["created_at"];
        $instance->updated_at = $data["updated_at"];
        $instance->closed_at = $data["closed_at"] ?? null;
        $instance->merged_at = $data["merged_at"] ?? null;
        $instance->merge_commit_sha = $data["merge_commit_sha"] ?? null;
        $instance->assignee = Util::getArgSafe($data, "assignee", User::fromArray(...));
        $instance->assignees = Util::getArraySafe($data, "assignees", User::fromArray(...), []);
        $instance->requested_reviewers = PullRequest::decodeRequestedReviewers($data, "requested_reviewers");
        $instance->requested_teams = Util::getArraySafe($data, "requested_teams", Team::fromArray(...), []);
        $instance->labels = Util::getArraySafe($data, "requested_teams", Label::fromArray(...), []);
        $instance->milestone = Util::getArgSafe($data, "milestone", Milestone::fromArray(...));
        $instance->commits_url = $data["commits_url"];
        $instance->review_comments_url = $data["review_comments_url"];
        $instance->review_comment_url = $data["review_comment_url"];
        $instance->comments_url = $data["comments_url"];
        $instance->statuses_url = $data["statuses_url"];
        $instance->head = Util::getArgSafe($data, "head", Target::fromArray(...));
        $instance->base = Util::getArgSafe($data, "base", Target::fromArray(...));
        $instance->_links = Util::getArgSafe($data, "_links", Links::fromArray(...));
        $instance->author_association = AuthorAssociation::from($data["author_association"]);
        $instance->auto_merge = Util::getArgSafe($data, "auto_merge", AutoMerge::fromArray(...));
        $instance->active_lock_reason = ActiveLockReason::tryFrom($data["active_lock_reason"]);
        $instance->draft = $data["draft"];
        $instance->merged = $data["merged"] ?? null;
        $instance->mergeable = $data["mergeable"] ?? null;
        $instance->rebaseable = $data["rebaseable"] ?? null;
        $instance->mergeable_state = $data["mergeable_state"];
        $instance->merged_by = Util::getArgSafe($data, "merged_by", User::fromArray(...));
        $instance->comments = $data["comments"];
        $instance->review_comments = $data["review_comments"];
        $instance->maintainer_can_modify = $data["maintainer_can_modify"];
        $instance->commits = $data["commits"];
        $instance->additions = $data["additions"];
        $instance->deletions = $data["deletions"];
        $instance->changed_files = $data["changed_files"];
        return $instance;
    }

    private static function decodeRequestedReviewers($data, $key): array
    {
        $result = [];
        if (array_key_exists($key, $data) and !empty($data[$key]) and is_array($data[$key])) {
            foreach ($data[$key] as $element) {
                if (array_key_exists("avatar_url", $element) and !empty($element["avatar_url"])) {
                    //parse as user
                    $result[] = User::fromArray($element);
                } else {
                    // parse as team
                    $result[] = Team::fromArray($element);
                }
            }
        }
        return $result;
    }
}
