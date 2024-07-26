<?php

namespace TK\GitHubWebhook\Handler;

use TK\GitHubWebhook\Request;
use TK\GitHubWebhook\Response;

interface EventHandlerInterface
{
    /** @return EventType[] */
    public function getTargetEvent(): array;
    public function handleEvent(Request $request, Response $response): Response;
}
