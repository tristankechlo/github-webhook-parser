<?php

namespace TK\GitHubWebhook\Model\Label;

use TK\GitHubWebhook\Model\Issue\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    public From|null $color;
    public From|null $name;
    public From|null $desctiption;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->color = Util::getArgSafe($data, "color", From::fromArray(...));
        $instance->name = Util::getArgSafe($data, "name", From::fromArray(...));
        $instance->desctiption = Util::getArgSafe($data, "description", From::fromArray(...));
        return $instance;
    }
}
