<?php

namespace TK\GitHubWebhook\Model\Ping;

use TK\GitHubWebhook\Util;

enum WebhookType: string
{
    case REPOSITORY = "Repository";
    case ORGANIZATION = "Organization";
    case APP = "App";
}

readonly class Webhook
{
    public WebhookType $type;
    public int $id;
    public string $name;
    public bool $active;
    /**
     * When you register a new GitHub App, GitHub sends a ping event to the **webhook URL** you specified during registration. 
     * The event contains the `app_id`, which is required for [authenticating](https://docs.github.com/en/apps/building-integrations/setting-up-and-registering-github-apps/about-authentication-options-for-github-apps) an app.
     */
    public int|null $app_id;
    /** @var string[] $events list of events this webhook is subsribed too (or "*" if subscribed to all)*/
    public array $events;
    public WebhookConfig $config;
    public string $updated_at;
    public string $created_at;
    public string $url;
    public string|null $test_url;
    public string $ping_url;
    public string $deliveries_url;
    public LastResponse|null $last_response;

    public static function fromArray(array $data): Webhook
    {
        $instance = new Webhook();
        $instance->type = WebhookType::from($data["type"]);
        $instance->id = $data["id"];
        $instance->name = $data["name"];
        $instance->active = $data["active"];
        $instance->app_id = $data["app_id"] ?? null;
        $instance->events = $data["events"];
        $instance->config = WebhookConfig::fromArray($data["config"]);
        $instance->updated_at = $data["updated_at"];
        $instance->created_at = $data["created_at"];
        $instance->url = $data["url"];
        $instance->test_url = $data["test_url"] ?? null;
        $instance->ping_url = $data["ping_url"];
        $instance->deliveries_url = $data["deliveries_url"];
        $instance->last_response = Util::getArgSafe($data, "last_response", LastResponse::fromArray(...));
        return $instance;
    }
}
