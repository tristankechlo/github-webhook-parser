<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Label;
use TK\GitHubWebhook\Model\Label\Changes;
use TK\GitHubWebhook\Model\Label\EventTypes;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Util;

class LabelEvent extends AbstractEvent
{
    public EventTypes $action;
    public Label $label;
    public Changes $changes;
    public InstallationLite|null $installation;

    public static function fromArray(array $data): LabelEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new LabelEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->label = Util::getArgSafe($data, "label", Label::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
