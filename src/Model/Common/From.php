<?php

namespace TK\GitHubWebhook\Model\Common;

/**
 * From
 * 
 * contains a string named 'from' that is expected to be present
 */
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
