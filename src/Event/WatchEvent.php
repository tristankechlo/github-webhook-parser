<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Watch\EventTypes;

class WatchEvent extends AbstractEvent
{
    public EventTypes $action;

    public static function fromArray(array $data): WatchEvent
    {
        /** @var WatchEvent $instance */
        $instance = AbstractEvent::createInstance($data, WatchEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        return $instance;
    }
}
