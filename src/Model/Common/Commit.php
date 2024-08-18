<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Util;

readonly class Commit
{
    public string $id;
    public string $tree_id;
    public bool $distinct;
    public string $message;
    public string $timestamp;
    public string $url;
    public Committer $author;
    public Committer $committer;
    /** @var string[] $added */
    public array $added;
    /** @var string[] $added */
    public array $removed;
    /** @var string[] $added */
    public array $modified;

    public static function fromArray(array $data): Commit
    {
        $instance = new Commit();
        $instance->id = $data["id"];
        $instance->tree_id = $data["tree_id"];
        $instance->distinct = $data["distinct"];
        $instance->message = $data["message"];
        $instance->timestamp = $data["timestamp"];
        $instance->url = $data["url"];
        $instance->author = Util::getArgSafe($data, "author", Committer::fromArray(...));
        $instance->committer = Util::getArgSafe($data, "committer", Committer::fromArray(...));
        $instance->added = Commit::getStringArraySafe($data, "added");
        $instance->removed = Commit::getStringArraySafe($data, "removed");
        $instance->modified = Commit::getStringArraySafe($data, "modified");
        return $instance;
    }

    private static function getStringArraySafe(array $data, string $key)
    {
        if (array_key_exists($key, $data) and !empty($data[$key]) and is_array($data[$key])) {
            return $data[$key];
        }
        return [];
    }
}
