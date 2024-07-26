<?php

namespace TK\GitHubWebhook\Model;

readonly class Committer
{
    public string $name;
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
