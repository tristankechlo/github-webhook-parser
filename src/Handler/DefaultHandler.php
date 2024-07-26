<?php

namespace TK\GitHubWebhook\Handler;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventTypes;
use TK\GitHubWebhook\Response;

class DefaultHandler implements EventHandlerInterface
{

    public function getTargetEvent(): array
    {
        return [EventTypes::ALL];
    }

    public function handleEvent(EventTypes $event_type, AbstractEvent $event, Response $response): Response
    {
        $response->setStatusCode(200);
        $response->setMessage("Successful (no actions run)");
        return $response;
    }
}