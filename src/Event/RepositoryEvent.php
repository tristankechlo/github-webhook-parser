<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Repository\Changes;
use TK\GitHubWebhook\Model\Repository\EventTypes;
use TK\GitHubWebhook\Util;

class RepositoryEvent extends AbstractEvent
{
    public EventTypes $action;
    public Changes|null $changes;

    public static function fromArray(array $data): RepositoryEvent
    {
        /** @var RepositoryEvent $instance */
        $instance = AbstractEvent::createInstance($data, RepositoryEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        return $instance;
    }
}
