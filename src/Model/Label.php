<?php

namespace TK\GitHubWebhook\Model;

readonly class Label
{
    public int $id;
    public string $node_id;
    public int $url;
    public string $name;
    public string|null $description;
    public string $color;
    public bool $default;

    public static function fromArray(array $data): Label
    {
    }
}