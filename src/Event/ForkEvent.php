<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Util;

class ForkEvent extends AbstractEvent
{
    public Repository $forkee;

    public static function fromArray(array $data): ForkEvent
    {
        /** @var ForkEvent $instance */
        $instance = AbstractEvent::createInstance($data, ForkEvent::class);
        $instance->forkee = Util::getArgSafe($data, "forkee", Repository::fromArray(...));
        return $instance;
    }
}
