<?php

namespace TK\GitHubWebhook;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventTypes;

readonly class Request
{
    public string $event_uuid; // unique message id, can be used to detect redeliveries
    public WebhookType $webhook_type; // detect if webhook is installed in repo or org
    public EventTypes $event_type;
    public AbstractEvent $event;
    public string $json_raw;

    public function __construct(string $event_uuid, WebhookType $webhook_type, EventTypes $event_type, AbstractEvent $event, string $json_raw)
    {
        $this->event_uuid = $event_uuid;
        $this->webhook_type = $webhook_type;
        $this->event_type = $event_type;
        $this->event = $event;
        $this->json_raw = $json_raw;
    }
}
