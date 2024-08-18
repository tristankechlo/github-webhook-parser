<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Release;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Model\Release\Changes;
use TK\GitHubWebhook\Model\Release\EventTypes;
use TK\GitHubWebhook\Util;

class ReleaseEvent extends AbstractEvent
{
    public EventTypes $action;
    public Release $release;
    public Changes|null $changes;

    public static  function fromArray(array $data): ReleaseEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new ReleaseEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->release = Util::getArgSafe($data, "release", Release::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
