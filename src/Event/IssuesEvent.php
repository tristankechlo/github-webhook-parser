<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Model\Issue\Changes;
use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Issue;
use TK\GitHubWebhook\Model\Issue\EventTypes;
use TK\GitHubWebhook\Model\Label;
use TK\GitHubWebhook\Model\Milestone;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Util;

class IssuesEvent extends AbstractEvent
{
    public EventTypes $action;
    public Issue $issue;
    public User|null $assignee;
    public InstallationLite|null $installation;
    public Milestone|null $milestone;
    public Label|null $label;
    public Changes|null $changes;

    public static function fromArray(array $data): IssuesEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new IssuesEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->issue = Issue::fromArray($data["issue"]);
        $instance->assignee = Util::getArgSafe($data, "assignee", User::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        $instance->milestone = Util::getArgSafe($data, "milestone", Milestone::fromArray(...));
        $instance->label = Util::getArgSafe($data, "label", Label::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        return $instance;
    }
}
