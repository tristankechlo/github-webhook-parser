<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Util;

enum ReleaseAssetState: string
{
    case UPLOADED = "uploaded";
}

readonly class ReleaseAsset
{
    public string $url;
    public string $browser_download_url;
    public int $id;
    public string $node_id;
    public string $name;
    public string|null $label;
    public ReleaseAssetState $state;
    public string $content_type;
    public int $size;
    public int $download_count;
    public string $created_at;
    public string $updated_at;
    public User|null $uploader;

    public static function fromArray(array $data): ReleaseAsset
    {
        $instance = new ReleaseAsset();
        $instance->url = $data["url"];
        $instance->browser_download_url = $data["browser_download_url"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->name = $data["name"];
        $instance->label = $data["label"] ?? null;
        $instance->state = ReleaseAssetState::from($data["state"]);
        $instance->content_type = $data["content_type"];
        $instance->size = $data["size"];
        $instance->download_count = $data["download_count"];
        $instance->created_at = $data["created_at"];
        $instance->updated_at = $data["updated_at"];
        $instance->uploader = Util::getArgSafe($data, "uploader", User::fromArray(...));
        return $instance;
    }
}
