<?php

namespace TK\GitHubWebhook\Model\Label;

use TK\GitHubWebhook\Model\Common\From\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    /** The previous version of the color if the action was `edited`. */
    public From|null $color;
    /** The previous version of the name if the action was `edited`. */
    public From|null $name;
    /** The previous version of the description if the action was `edited`. */
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
