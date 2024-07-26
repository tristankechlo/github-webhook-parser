<?php

namespace TK\GitHubWebhook\Handler;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventTypes;
use TK\GitHubWebhook\Response;

interface EventHandlerInterface
{
    /** @return EventType[] */
    public function getTargetEvent(): array;
    public function handleEvent(EventTypes $event_type, AbstractEvent $event, Response $response): Response;
}
