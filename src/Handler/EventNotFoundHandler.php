<?php

namespace TK\GitHubWebhook\Handler;

use TK\GitHubWebhook\Response;

interface EventNotFoundHandler
{
  public function handleEvent(string $event_type, array $json, string $json_raw, Response $response): Response;
}
