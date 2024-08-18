<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Model\Repository\Changes;
use TK\GitHubWebhook\Model\Repository\EventTypes;
use TK\GitHubWebhook\Util;

class RepositoryEvent extends AbstractEvent
{
    public EventTypes $action;
    public Changes|null $changes;

    public static function fromArray(array $data): RepositoryEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new RepositoryEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
