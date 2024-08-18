# GitHub Webhook Parser

can parse a recieved json from github's webhook service

## currently supported events

| event type    | description                                                | possible activity                                                                                                                                                                                                                                                                |
| :------------ | :--------------------------------------------------------- | :------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| create        | A Git branch or tag is created.                            |                                                                                                                                                                                                                                                                                  |
| delete        | A Git branch or tag is deleted.                            |                                                                                                                                                                                                                                                                                  |
| fork          | A user forks a repository.                                 |                                                                                                                                                                                                                                                                                  |
| gollum        | A wiki page has been edited or created.                    |                                                                                                                                                                                                                                                                                  |
| issue_comment | Activity related to comments on issues or pull requests.   | created, deleted, edited                                                                                                                                                                                                                                                         |
| issues        | Activity related to an issue.                              | assigned, closed, deleted, demilestoned, edited, labeled, locked, milestoned, opened, pinned, reopened, transferred, unassigned, unlabeled, unlocked, unpinned                                                                                                                   |
| label         | Activity related to a label.                               | created, deleted, edited                                                                                                                                                                                                                                                         |
| ping          | A new webhook was added to the repository or organization. |                                                                                                                                                                                                                                                                                  |
| pull_request  | Activity related to a pull request.                        | assigned, auto_merge_disabled, auto_merge_enabled, closed, converted_to_draft, demilestoned, dequeued, edited, enqueued, labeled, locked, milestoned, opened, ready_for_review, reopened, review_request_removed, review_requested, synchronize, unassigned, unlabeled, unlocked |
| push          | Commits are pushed to a repository.                        |                                                                                                                                                                                                                                                                                  |
| release       | Activity related to a release.                             | created, deleted, edited, prereleased, published, released, unpublished                                                                                                                                                                                                          |
| repository    | Activity related to the repository.                        | archived, created, deleted, edited, privatized, publicized, renamed, transferred, unarchived                                                                                                                                                                                     |
| star          | A user stars or unstars a repository.                      | created, deleted                                                                                                                                                                                                                                                                 |
| watch         | A user started watching a repository                       | started                                                                                                                                                                                                                                                                          |

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