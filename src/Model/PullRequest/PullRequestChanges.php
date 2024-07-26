<?php

namespace TK\GitHubWebhook\Model\PullRequest;

use TK\GitHubWebhook\Model\Issue\From;
use TK\GitHubWebhook\Util;

readonly class PullRequestChanges
{
    public From $body;
    public From $title;
    public PullRequestChangesBase $base;

    public static function fromArray(array $data): PullRequestChanges
    {
        $instance = new PullRequestChanges();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        $instance->title = Util::getArgSafe($data, "title", From::fromArray(...));
        return $instance;
    }
}
