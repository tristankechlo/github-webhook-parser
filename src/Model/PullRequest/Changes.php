<?php

namespace TK\GitHubWebhook\Model\PullRequest;

use TK\GitHubWebhook\Model\Common\From;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    /** The previous version of the body if the action was `edited`. */
    public From|null $body;
    /** The previous version of the title if the action was `edited`. */
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
