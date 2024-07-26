<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\Star\EventTypes;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Util;

class StarEvent extends AbstractEvent
{
    public EventTypes $action;
    public string|null $starred_at;
    public InstallationLite|null $installation;

    public static function fromArray(array $data): StarEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new StarEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->starred_at = $data["starred_at"] ?? null;
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
