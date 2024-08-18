<?php

namespace TK\GitHubWebhook\Model\Common;

readonly class Label
{
    public int $id;
    public string $node_id;
    /** URL for the label */
    public string $url;
    /** The name of the label. */
    public string $name;
    public string|null $description;
    /** 6-character hex code, without the leading #, identifying the color */
    public string $color;
    public bool $default;

    public static function fromArray(array $data): Label
    {
        $instance = new Label();
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->url = $data["url"];
        $instance->name = $data["name"];
        $instance->description = $data["description"] ?? null;
        $instance->color = $data["color"];
        $instance->default = $data["default"];
        return $instance;
    }
}