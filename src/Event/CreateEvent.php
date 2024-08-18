<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Create\RefType;
use TK\GitHubWebhook\Model\InstallationLite;
use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Util;

class CreateEvent extends AbstractEvent
{
    public string $ref;
    public RefType $ref_type;
    public string $master_branch;
    public string|null $description;
    public string $pusher_type;
    public InstallationLite|null $installation;

    public static  function fromArray(array $data): CreateEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new CreateEvent($repository, $sender, $organization);
        $instance->ref = $data["ref"];
        $instance->ref_type = RefType::from($data["ref_type"]);
        $instance->master_branch = $data["master_branch"];
        $instance->description = $data["description"] ?? null;
        $instance->pusher_type = $data["pusher_type"];
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
