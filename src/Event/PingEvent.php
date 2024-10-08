<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Ping\{Webhook};
use TK\GitHubWebhook\Model\Common\{Organization, User, Repository};
use TK\GitHubWebhook\Util;

class PingEvent extends AbstractEvent
{
    public string $zen;
    /** The ID of the webhook that triggered the ping. */
    public int $hook_id;
    /** The [webhook configuration](https://docs.github.com/en/rest/reference/repos#get-a-repository-webhook). */
    public Webhook $hook;

    public static function fromArray(array $data): PingEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", Organization::fromArray(...));

        $instance = new PingEvent($repository, $sender, $organization);
        $instance->zen = $data["zen"];
        $instance->hook_id = $data["hook_id"];
        $instance->hook = Webhook::fromArray($data["hook"]);
        return $instance;
    }
}
