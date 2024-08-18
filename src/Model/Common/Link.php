<?php

namespace TK\GitHubWebhook\Model\Common;

readonly class Link
{
    public string $href;

    public static function fromArray(array $data): Link
    {
        $instance = new Link();
        $instance->href = $data["href"];
        return $instance;
    }
}
