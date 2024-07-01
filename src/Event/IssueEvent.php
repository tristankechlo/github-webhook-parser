<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Model\Issue\Changes;
use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Issue;
use TK\GitHubWebhook\Model\Issue\IssueState;
use TK\GitHubWebhook\Model\Label;
use TK\GitHubWebhook\Model\Milestone;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\User;

class IssueEvent extends AbstractEvent
{
    public IssueState $action;
    public Issue $issue;
    public User|null $assignee;
    public InstallationLite|null $installation;
    public Milestone|null $milestone;
    public Label|null $label;
    public Changes|null $changes;

    public static function fromArray(array $data): IssueEvent
    {
        $repository = array_key_exists("repository", $data) ? Repository::fromArray($data["repository"]) : null;
        $sender = array_key_exists("sender", $data) ? User::fromArray($data["sender"]) : null;
        $organization = array_key_exists("organization", $data) ? User::fromArray($data["organization"]) : null;

        $instance = new IssueEvent($repository, $sender, $organization);
        $instance->action = IssueState::from($data["action"]);
        $instance->issue = Issue::fromArray($data["issue"]);
        $instance->assignee = array_key_exists("assignee", $data) ? User::fromArray($data["assignee"]) : null;
        $instance->installation = array_key_exists("installation", $data) ? InstallationLite::fromArray($data["installation"]) : null;
        $instance->milestone = array_key_exists("milestone", $data) ? Milestone::fromArray($data["milestone"]) : null;
        $instance->label = array_key_exists("label", $data) ? Label::fromArray($data["label"]) : null;
        $instance->changes = array_key_exists("changes", $data) ? Changes::fromArray($data["changes"]) : null;
        return $instance;
    }
}
