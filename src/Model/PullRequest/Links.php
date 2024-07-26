<?php

namespace TK\GitHubWebhook\Model\PullRequest;

readonly class Links
{
    public string $self;
    public string $html;
    public string $issue;
    public string $comments;
    public string $review_comments;
    public string $review_comment;
    public string $commits;
    public string $statuses;

    public static function fromArray(array $data): Links
    {
        $instance = new Links();
        $instance->self = $data["self"];
        $instance->html = $data["html"];
        $instance->issue = $data["issue"];
        $instance->comments = $data["comments"];
        $instance->review_comments = $data["review_comments"];
        $instance->review_comment = $data["review_comment"];
        $instance->commits = $data["commits"];
        $instance->statuses = $data["statuses"];
        return $instance;
    }
}
