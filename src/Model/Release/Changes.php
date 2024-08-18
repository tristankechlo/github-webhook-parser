<?php

namespace TK\GitHubWebhook\Model\Release;

use TK\GitHubWebhook\Model\Common\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    public From|null $body;
    public From|null $name;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        $instance->name = Util::getArgSafe($data, "name", From::fromArray(...));
        return $instance;
    }
}
