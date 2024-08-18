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

/** Groups of organization members that gives permissions on specified repositories. */
readonly class Team
{
    /** Name of the team */
    public string $name;
    /** Unique identifier of the team */
    public int $id;
    public string $node_id;
    public string $slug;
    /** Description of the team */
    public string|null $description;
    public TeamPrivacy $privacy;
    /** URL for the team */
    public string $url;
    public string $html_url;
    public string $members_url;
    public string $repositories_url;
    /** Permission that the team will have for its repositories */
    public string $permission;
    /** can only have one layer of parents (a parent can not have a parent itself) */
    public Team|null $parent;
    /** Whether team members will receive notifications when their team is @mentioned */
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
