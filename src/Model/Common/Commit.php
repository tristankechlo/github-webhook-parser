<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Util;

readonly class Commit
{
    public string $id;
    public string $tree_id;
    /** Whether this commit is distinct from any that have been pushed before. */
    public bool $distinct;
    /** The commit message. */
    public string $message;
    /** The ISO 8601 timestamp of the commit. */
    public string $timestamp;
    /** URL that points to the commit API resource. */
    public string $url;
    /** Metaproperties for Git author information. */
    public Committer $author;
    /** Metaproperties for Git committer information. */
    public Committer $committer;
    /**
     * An array of files added in the commit.
     * For extremely large commits where GitHub is unable to calculate this list in a timely manner, this may be empty even if files were added.
     * @var string[] $added
     */
    public array $added;
    /**
     * An array of files modified by the commit.
     * For extremely large commits where GitHub is unable to calculate this list in a timely manner, this may be empty even if files were modified.
     * @var string[] $added
     */
    public array $removed;
    /**
     * An array of files removed in the commit.
     * For extremely large commits where GitHub is unable to calculate this list in a timely manner, this may be empty even if files were removed.
     * @var string[] $modified
     */
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
