<?php

namespace TK\GitHubWebhook\Model\Repository;

readonly class RepositoryPermissions
{
    public bool $push;
    public bool $pull;
    public bool $admin;
    public bool|null $maintain;
    public bool|null $triage;

    public static function fromArray(array $data): RepositoryPermissions
    {
        $instance = new RepositoryPermissions();
        $instance->push = $data["push"];
        $instance->pull = $data["pull"];
        $instance->admin = $data["admin"];
        $instance->maintain = $data["maintain"] ?? null;
        $instance->triage = $data["triage"] ?? null;
        return $instance;
    }
}
