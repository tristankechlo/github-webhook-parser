<?php

namespace TK\GitHubWebhook\Model\Release;

use TK\GitHubWebhook\Model\Common\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    /** The previous version of the body if the action was `edited`. */
    public From|null $body;
    /** The previous version of the name if the action was `edited`.The previous version of the name if the action was `edited`. */
    public From|null $name;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        $instance->name = Util::getArgSafe($data, "name", From::fromArray(...));
        return $instance;
    }
}
