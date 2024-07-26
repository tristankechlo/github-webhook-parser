<?php

namespace TK\GitHubWebhook\Model;

use TK\GitHubWebhook\Model\App\Permissions;
use TK\GitHubWebhook\Model\App\AppEvent;

readonly class App
{
    public int $id;
    public string|null $slug;
    public string $node_id;
    public User $owner;
    public string $name;
    public string|null $description;
    public string $external_url;
    public string $html_url;
    public string $created_at;
    public string $updated_at;
    public Permissions|null $permissions;
    /** @var \TK\GitHubWebhook\Model\App\AppEvent[] $events */
    public array $events;

    public static function fromArray(array $data): App|null
    {
        if(empty($data)) {
            return null;
        }
        $instance = new App();
        $instance->id = $data["id"];
        $instance->slug = $data["slug"] ?? null;
        $instance->node_id = $data["node_id"];
        $instance->owner = User::fromArray($data["owner"]);
        $instance->name = $data["name"];
        $instance->description = $data["description"] ?? null;
        $instance->external_url = $data["external_url"];
        $instance->html_url = $data["html_url"];
        $instance->created_at = $data["created_at"];
        $instance->updated_at = $data["updated_at"];
        $instance->permissions = array_key_exists("permissions", $data) ? Permissions::fromArray($data["permissions"]) : null;
        $instance->events = array_map(function ($entry) {
            return AppEvent::from($entry);
        }, $data["events"]);
        return $instance;
    }
}