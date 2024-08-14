<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Create\RefType;

class CreateEvent extends AbstractEvent
{
    public string $ref;
    public RefType $ref_type;
    public string $master_branch;
    public string|null $description;
    public string $pusher_type;

    public static  function fromArray(array $data): CreateEvent
    {
        /** @var CreateEvent $instance */
        $instance = AbstractEvent::createInstance($data, CreateEvent::class);
        $instance->ref = $data["ref"];
        $instance->ref_type = RefType::from($data["ref_type"]);
        $instance->master_branch = $data["master_branch"];
        $instance->description = $data["description"] ?? null;
        $instance->pusher_type = $data["pusher_type"];
        return $instance;
    }
}
