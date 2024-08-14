# GitHub Webhook Parser

can parse a recieved json from github's webhook service

## currently supported events

- ping
- issue
- pull_request
- fork
- push
- star
- watch
- create
- delete
- label
- release
- issue_comment (this will also trigger for comments on pull requests)
- repository

## Source

[https://github.com/octokit/webhooks/](https://github.com/octokit/webhooks/)

## Usage

```php
<?php # index.php

require_once __DIR__ . "/vendor/autoload.php";

use TK\GitHubWebhook\WebhookHandler;
use TK\GitHubWebhook\Exception\SignatureMismatchException;
use TK\GitHubWebhook\Exception\WebhookException;
use TK\GitHubWebhook\Exception\WebhookParseException;

try {
    $handler = new WebhookHandler();
    $handler->setSecret("**************");  // the same secret you entered while creating the webhook on github.com
    $handler->registerHandler(new \Your\Custom\PingHandler());
    $handler->handle();
} catch (SignatureMismatchException $e) {
    header("HTTP/1.1 401 Unauthorized");
    exit($th->getMessage());
} catch (\Throwable | WebhookException | WebhookParseException $e) {
    header("HTTP/1.1 400 Bad Request");
    exit($e->getMessage());
}

```

```php
<?php # PingHandler.php

namespace Your\Custom;

use TK\GitHubWebhook\Event\EventTypes;
use TK\GitHubWebhook\Event\PingEvent;
use TK\GitHubWebhook\Handler\EventHandlerInterface;
use TK\GitHubWebhook\Request;
use TK\GitHubWebhook\Response;

class PingHandler implements EventHandlerInterface
{

    public function getTargetEvent(): array
    {
        return [EventTypes::PING];
    }

    public function handleEvent(Request $request, Response $response): Response
    {
        if ($request->event instanceof PingEvent) {
            $response->setStatusCode(200);
            $response->setMessage("Pong!");
            return $response;
        }

        // do stuff with the input
        $response->setStatusCode(200);
        $response->setMessage("Not Used");
        return $response;
    }
}
```