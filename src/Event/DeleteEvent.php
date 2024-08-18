<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Delete\RefType;
use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

class DeleteEvent extends AbstractEvent
{
    public string $ref;
    public RefType $ref_type;
    public string $pusher_type;
    public InstallationLite|null $installation;

    public static  function fromArray(array $data): DeleteEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new DeleteEvent($repository, $sender, $organization);
        $instance->ref = $data["ref"];
        $instance->ref_type = RefType::from($data["ref_type"]);
        $instance->pusher_type = $data["pusher_type"];
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
