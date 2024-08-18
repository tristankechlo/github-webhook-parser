<?php

namespace TK\GitHubWebhook\Model\IssueComment;

use TK\GitHubWebhook\Model\Common\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    public From $body;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        return $instance;
    }
}
