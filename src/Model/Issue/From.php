<?php

namespace TK\GitHubWebhook\Model\Issue;

readonly class From
{
    public string $from;

    public static function fromArray(array $data): From
    {
        $instance = new From();
        $instance->from = $data["from"];
        return $instance;
    }
}