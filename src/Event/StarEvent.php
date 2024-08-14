<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Star\EventTypes;

class StarEvent extends AbstractEvent
{
    public EventTypes $action;
    public string|null $starred_at;

    public static function fromArray(array $data): StarEvent
    {
        /** @var StarEvent $instance */
        $instance = AbstractEvent::createInstance($data, StarEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        $instance->starred_at = $data["starred_at"] ?? null;
        return $instance;
    }
}
