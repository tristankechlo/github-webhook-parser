<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Ping\{Webhook};
use TK\GitHubWebhook\Model\{User, Repository};

class PingEvent extends AbstractEvent
{
    public string $zen;
    public int $hook_id;
    public Webhook $hook;

    public static function fromArray(array $data): PingEvent
    {
        $repository = array_key_exists("repository", $data) ? Repository::fromArray($data["repository"]) : null;
        $sender = array_key_exists("sender", $data) ? User::fromArray($data["sender"]) : null;
        $organization = array_key_exists("organization", $data) ? User::fromArray($data["organization"]) : null;

        $instance = new PingEvent($repository, $sender, $organization);
        $instance->zen = $data["zen"];
        $instance->hook_id = $data["hook_id"];
        $instance->hook = Webhook::fromArray($data["hook"]);
        return $instance;
    }
}
