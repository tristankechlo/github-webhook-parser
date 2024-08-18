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
    /** The action that was performed. */
    public EventTypes $action;
    /** The [issue](https://docs.github.com/en/rest/reference/issues) itself. */
    public Issue $issue;
    /** The optional user who was assigned or unassigned from the issue. */
    public User|null $assignee;
    public Milestone|null $milestone;
    /** The label that was added/removed to the issue. */
    public Label|null $label;
    /** The changes to the issue. */
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
