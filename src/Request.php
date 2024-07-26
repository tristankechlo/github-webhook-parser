<?php

namespace TK\GitHubWebhook;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventTypes;

readonly class Request
{
    public EventTypes $event_type;
    public AbstractEvent $event;
    public string $json_raw;

    public function __construct(EventTypes $event_type, AbstractEvent $event, string $json_raw)
    {
        $this->event_type = $event_type;
        $this->event = $event;
        $this->json_raw = $json_raw;
    }
}
