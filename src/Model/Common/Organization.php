<?php

namespace TK\GitHubWebhook\Model\Common;

readonly class Organization
{
    public string $login;
    public int $id;
    public string $node_id;
    public string $url;
    public string|null $html_url;
    public string $repos_url;
    public string $events_url;
    public string $hooks_url;
    public string $issues_url;
    public string $members_url;
    public string $public_members_url;
    public string $avatar_url;
    public string|null $description;

    public static function fromArray(array $data): Organization
    {
        $instance = new Organization();
        $instance->login = $data["login"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->url = $data["url"];
        $instance->html_url = $data["html_url"] ?? null;
        $instance->repos_url = $data["repos_url"];
        $instance->events_url = $data["events_url"];
        $instance->hooks_url = $data["hooks_url"];
        $instance->issues_url = $data["issues_url"];
        $instance->members_url = $data["members_url"];
        $instance->public_members_url = $data["public_members_url"];
        $instance->avatar_url = $data["avatar_url"];
        $instance->description = $data["description"] ?? null;
        return $instance;
    }
}
