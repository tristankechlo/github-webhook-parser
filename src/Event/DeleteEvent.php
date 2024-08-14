<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Delete\RefType;

class DeleteEvent extends AbstractEvent
{
    public string $ref;
    public RefType $ref_type;
    public string $pusher_type;

    public static  function fromArray(array $data): DeleteEvent
    {
        /** @var DeleteEvent $instance */
        $instance = AbstractEvent::createInstance($data, DeleteEvent::class);
        $instance->ref = $data["ref"];
        $instance->ref_type = RefType::from($data["ref_type"]);
        $instance->pusher_type = $data["pusher_type"];
        return $instance;
    }
}
