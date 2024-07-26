<?php

namespace TK\GitHubWebhook;

class Util
{

    public static function getArray(array $data, string $key, mixed $callback): array
    {
        return array_map(function ($entry) use ($callback) {
            return $callback($entry);
        }, $data[$key]);
    }

    public static function getArgSafe(array $data, string $key, mixed $callback): mixed
    {
        if (array_key_exists($key, $data) and !empty($data[$key])) {
            return $callback($data[$key]);
        }
        return null;
    }

    public static function getArraySafe(array $data, string $key, mixed $callback, mixed $default = null): array|null
    {
        if (array_key_exists($key, $data) and !empty($data[$key]) and is_array($data[$key])) {
            return Util::getArray($data, $key, $callback);
        }
        return $default;
    }
}
