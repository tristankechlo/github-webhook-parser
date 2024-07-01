<?php

namespace TK\GitHubWebhook\Handler;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventType;
use TK\GitHubWebhook\Response;

class DefaultHandler implements EventHandlerInterface
{

    public function getTargetEvent(): array
    {
        return [EventType::ALL];
    }

    public function handleEvent(EventType $event_type, AbstractEvent $event, Response $response): Response
    {
        $response->setStatusCode(200);
        $response->setMessage("Successful (no actions run)");
        return $response;
    }
}