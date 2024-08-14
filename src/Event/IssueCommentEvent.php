<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\Issue;
use TK\GitHubWebhook\Model\Common\IssueComment;
use TK\GitHubWebhook\Model\IssueComment\Changes;
use TK\GitHubWebhook\Model\IssueComment\EventTypes;
use TK\GitHubWebhook\Util;

class IssueCommentEvent extends AbstractEvent
{
    public EventTypes $action;
    public Issue $issue;
    public IssueComment $comment;
    public Changes|null $changes;

    public static function fromArray(array $data): IssueCommentEvent
    {
        /** @var IssueCommentEvent $instance */
        $instance = AbstractEvent::createInstance($data, IssueCommentEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        $instance->issue = Util::getArgSafe($data, "issue", Issue::fromArray(...));
        $instance->comment = Util::getArgSafe($data, "comment", IssueComment::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        return $instance;
    }
}
