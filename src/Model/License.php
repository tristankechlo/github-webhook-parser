<?php

namespace TK\GitHubWebhook\Model;

readonly class License
{
    public string $key;
    public string $name;
    public string $spdx_id;
    public string|null $url;
    public string $node_id;

    public static function fromArray(array|null $data): License|null
    {
        if (empty($data)) {
            return null;
        }
        $instance = new License();
        $instance->key = $data["key"];
        $instance->name = $data["name"];
        $instance->spdx_id = $data["spdx_id"];
        $instance->url = $data["url"] ?? null;
        $instance->node_id = $data["node_id"];
        return $instance;
    }
}
