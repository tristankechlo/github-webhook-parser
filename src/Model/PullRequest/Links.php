<?php

namespace TK\GitHubWebhook\Model\PullRequest;

use TK\GitHubWebhook\Model\Link;

readonly class Links
{
    public Link $self;
    public Link $html;
    public Link $issue;
    public Link $comments;
    public Link $review_comments;
    public Link $review_comment;
    public Link $commits;
    public Link $statuses;

    public static function fromArray(array $data): Links
    {
        $instance = new Links();
        $instance->self = Link::fromArray($data["self"]);
        $instance->html = Link::fromArray($data["html"]);
        $instance->issue = Link::fromArray($data["issue"]);
        $instance->comments = Link::fromArray($data["comments"]);
        $instance->review_comments = Link::fromArray($data["review_comments"]);
        $instance->review_comment = Link::fromArray($data["review_comment"]);
        $instance->commits = Link::fromArray($data["commits"]);
        $instance->statuses = Link::fromArray($data["statuses"]);
        return $instance;
    }
}
