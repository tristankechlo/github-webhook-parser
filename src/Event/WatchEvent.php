<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Model\Watch\EventTypes;
use TK\GitHubWebhook\Util;

class WatchEvent extends AbstractEvent
{
    public EventTypes $action;
    public InstallationLite|null $installation;

    public static function fromArray(array $data): WatchEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new WatchEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
