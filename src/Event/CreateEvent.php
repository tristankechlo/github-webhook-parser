<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Create\RefType;

class CreateEvent extends AbstractEvent
{
    /** The [`git ref`](https://docs.github.com/en/rest/reference/git#get-a-reference) resource. */
    public string $ref;
    /** The type of Git ref object created in the repository. Can be either `branch` or `tag`. */
    public RefType $ref_type;
    /** The name of the repository's default branch (usually `main`). */
    public string $master_branch;
    /** The repository's current description. */
    public string|null $description;
    /** The pusher type for the event. Can be either `user` or a deploy key. */
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
