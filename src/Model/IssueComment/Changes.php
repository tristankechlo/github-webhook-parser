<?php

namespace TK\GitHubWebhook\Model\IssueComment;

use TK\GitHubWebhook\Model\Common\From\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    /** The previous version of the body. */
    public From $body;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        return $instance;
    }
}
