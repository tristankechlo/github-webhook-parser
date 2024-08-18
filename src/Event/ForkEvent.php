<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

class ForkEvent extends AbstractEvent
{
    public Repository $forkee;
    public InstallationLite|null $installation;

    public static function fromArray(array $data): ForkEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new ForkEvent($repository, $sender, $organization);
        $instance->forkee = Util::getArgSafe($data, "forkee", Repository::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
