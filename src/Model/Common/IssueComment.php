<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Model\Common\AuthorAssociation;
use TK\GitHubWebhook\Util;

/** The [comment](https://docs.github.com/en/rest/reference/issues#comments) itself. */
readonly class IssueComment
{
    /** URL for the issue comment */
    public string $url;
    public string $html_url;
    public string $issue_url;
    /** Unique identifier of the issue comment */
    public int $id;
    public string $node_id;
    public User $user;
    public string $created_at;
    public string $updated_at;
    public AuthorAssociation $author_association;
    public App|null $performed_via_github_app;
    /** Contents of the issue comment */
    public string $body;
    public Reactions $reactions;

    public static function fromArray(array $data): IssueComment
    {
        $instance = new IssueComment();
        $instance->url = $data["url"];
        $instance->html_url = $data["html_url"];
        $instance->issue_url = $data["issue_url"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->user = Util::getArgSafe($data, "user", User::fromArray(...));
        $instance->created_at = $data["created_at"];
        $instance->updated_at = $data["updated_at"];
        $instance->author_association = AuthorAssociation::from($data["author_association"]);
        $instance->performed_via_github_app = Util::getArgSafe($data, "performed_via_github_app", App::fromArray(...));
        $instance->body = $data["body"];
        $instance->reactions = Util::getArgSafe($data, "reactions", Reactions::fromArray(...));
        return $instance;
    }
}
