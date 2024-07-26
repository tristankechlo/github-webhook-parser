<?php

namespace TK\GitHubWebhook\Model\Issue;

readonly class From
{
    public string $from;

    public static function fromArray(array $data): From|null
    {
        if(empty($data)) {
            return null;
        }
        $instance = new From();
        $instance->from = $data["from"];
        return $instance;
    }
}