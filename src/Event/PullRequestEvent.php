<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Label;
use TK\GitHubWebhook\Model\Milestone;
use TK\GitHubWebhook\Model\PullRequest;
use TK\GitHubWebhook\Model\PullRequest\EventTypes;
use TK\GitHubWebhook\Model\PullRequest\Changes;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\Team;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Util;

class PullRequestEvent extends AbstractEvent
{

    public EventTypes $action;
    public int $number;
    public PullRequest $pull_request;
    public User|null $assignee;
    public string $reason;
    public InstallationLite|null $installation;
    public Milestone|null $milestone;
    public Changes|null $changes;
    public Label|null $label;
    public User|null $requested_reviewer;
    public Team|null $requested_team;
    public string|null $before;
    public string|null $after;

    public static function fromArray(array $data): PullRequestEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new PullRequestEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->number = $data["number"];
        $instance->pull_request = PullRequest::fromArray($data["pull_request"]);
        $instance->assignee = Util::getArgSafe($data, "assignee", User::fromArray(...));
        $instance->reason = $data["reason"];
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        $instance->milestone = Util::getArgSafe($data, "milestone", Milestone::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        $instance->label = Util::getArgSafe($data, "label", Label::fromArray(...));
        $instance->requested_reviewer = Util::getArgSafe($data, "requested_reviewer", User::fromArray(...));
        $instance->requested_team = Util::getArgSafe($data, "requested_team", Team::fromArray(...));
        $instance->before = $data["before"];
        $instance->after = $data["after"];
        return $instance;
    }
}
