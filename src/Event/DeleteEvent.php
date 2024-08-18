<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Delete\RefType;

class DeleteEvent extends AbstractEvent
{
    /** The [`git ref`](https://docs.github.com/en/rest/reference/git#get-a-reference) resource. */
    public string $ref;
    /** The type of Git ref object deleted in the repository. Can be either `branch` or `tag`. */
    public RefType $ref_type;
    /** The pusher type for the event. Can be either `user` or a deploy key. */
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
