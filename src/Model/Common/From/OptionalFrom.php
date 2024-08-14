<?php

namespace TK\GitHubWebhook\Model\Common\From;

/**
 * OptionalFrom
 * 
 * contains a string named 'from' that might be present
 */
readonly class OptionalFrom
{
    public string|null $from;

    public static function fromArray(array $data): OptionalFrom
    {
        $instance = new OptionalFrom();
        $instance->from = $data["from"] ?? null;
        return $instance;
    }
}
