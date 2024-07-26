<?php

namespace TK\GitHubWebhook\Model\PullRequest;

use TK\GitHubWebhook\Model\Issue\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    public From|null $body;
    public From|null $title;
    public ChangesBase|null $base;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        $instance->title = Util::getArgSafe($data, "title", From::fromArray(...));
        $instance->base = Util::getArgSafe($data, "base", ChangesBase::fromArray(...));
        return $instance;
    }
}
