<?php

namespace TK\GitHubWebhook\Handler;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventType;
use TK\GitHubWebhook\Response;

interface EventHandlerInterface
{
    /** @return EventType[] */
    public function getTargetEvent(): array;
    public function handleEvent(EventType $event_type, AbstractEvent $event, Response $response): Response;
}
