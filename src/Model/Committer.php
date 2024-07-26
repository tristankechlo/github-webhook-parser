<?php

namespace TK\GitHubWebhook\Model;

readonly class Committer
{
    public string $name;
    public string|null $email;
    public string $date;
    public string $username;

    public static function fromArray(array $data): Committer
    {
        $instance = new Committer();
        $instance->name = $data["name"];
        $instance->email = $data["email"] ?? null;
        $instance->date = $data["date"];
        $instance->username = $data["username"];
        return $instance;
    }
}
