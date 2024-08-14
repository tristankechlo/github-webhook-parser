<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Model\Issue\Changes;
use TK\GitHubWebhook\Model\Common\Issue;
use TK\GitHubWebhook\Model\Issue\EventTypes;
use TK\GitHubWebhook\Model\Common\Label;
use TK\GitHubWebhook\Model\Common\Milestone;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

class IssuesEvent extends AbstractEvent
{
    public EventTypes $action;
    public Issue $issue;
    public User|null $assignee;
    public Milestone|null $milestone;
    public Label|null $label;
    public Changes|null $changes;

    public static function fromArray(array $data): IssuesEvent
    {
        /** @var IssuesEvent $instance */
        $instance = AbstractEvent::createInstance($data, IssuesEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        $instance->issue = Issue::fromArray($data["issue"]);
        $instance->assignee = Util::getArgSafe($data, "assignee", User::fromArray(...));
        $instance->milestone = Util::getArgSafe($data, "milestone", Milestone::fromArray(...));
        $instance->label = Util::getArgSafe($data, "label", Label::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        return $instance;
    }
}
