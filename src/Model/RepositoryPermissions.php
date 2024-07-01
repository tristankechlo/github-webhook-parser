<?php

namespace TK\GitHubWebhook\Model;

readonly class RepositoryPermissions
{
    public bool $push;
    public bool $pull;
    public bool $admin;
    public bool|null $maintain;
    public bool|null $triage;

    public static function fromArray(array|null $data): RepositoryPermissions|null
    {
        if (empty($data)) {
            return null;
        }
        $instance = new RepositoryPermissions();
        $instance->push = $data["push"];
        $instance->pull = $data["pull"];
        $instance->admin = $data["admin"];
        $instance->maintain = $data["maintain"] ?? null;
        $instance->triage = $data["triage"] ?? null;
        return $instance;
    }
}
