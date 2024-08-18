<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Util;

/**
 * ArrayFrom
 * 
 * contains an array named 'from' that containes only strings
 */
readonly class ArrayFrom
{
    /** @var string[] $from */
    public array $from;

    public static function fromArray(array $data): ArrayFrom
    {
        $instance = new ArrayFrom();
        $instance->from = Util::getArraySafe($data, "from", function ($e) {
            return $e;
        }, []);
        return $instance;
    }
}
