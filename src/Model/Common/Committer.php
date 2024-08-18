<?php

namespace TK\GitHubWebhook\Model\Common;

/** Metaproperties for Git author/committer information. */
readonly class Committer
{
    /** The git author's name. */
    public string $name;
    /** The git author's email address. */
    public string|null $email;
    public string|null $date;
    public string|null $username;

    public static function fromArray(array $data): Committer
    {
        $instance = new Committer();
        $instance->name = $data["name"];
        $instance->email = $data["email"] ?? null;
        $instance->date = $data["date"] ?? null;
        $instance->username = $data["username"] ?? null;
        return $instance;
    }
}
