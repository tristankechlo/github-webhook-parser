<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Util;

enum TeamPrivacy: string
{
    case OPEN = "open";
    case CLOSED = "closed";
    case SECRET = "secret";
}

enum TeamNotificationSettings: string
{
    case NOTIFICATIONS_ENABLED = "notifications_enabled";
    case NOTIFICATIONS_DISABLED = "notifications_disabled";
}

readonly class Team
{
    public string $name;
    public int $id;
    public string $node_id;
    public string $slug;
    public string|null $description;
    public TeamPrivacy $privacy;
    public string $url;
    public string $html_url;
    public string $members_url;
    public string $repositories_url;
    public string $permission;
    public Team|null $parent;
    public TeamNotificationSettings|null $notification_setting;

    public static function fromArray(array $data): Team
    {
        $instance = new Team();
        $instance->name = $data["name"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->slug = $data["slug"];
        $instance->description = $data["description"] ?? null;
        $instance->privacy = TeamPrivacy::tryFrom($data["privacy"]);
        $instance->url = $data["url"];
        $instance->html_url = $data["html_url"];
        $instance->members_url = $data["members_url"];
        $instance->repositories_url = $data["repositories_url"];
        $instance->permission = $data["permission"];
        $instance->parent = Util::getArgSafe($data, "parent", Team::fromArray(...));
        $instance->notification_setting = TeamNotificationSettings::tryFrom($data["notification_setting"]);
        return $instance;
    }
}
