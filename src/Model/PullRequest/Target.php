<?php

namespace TK\GitHubWebhook\Model\PullRequest;

use TK\GitHubWebhook\Model\Repository;
use TK\GitHubWebhook\Model\User;
use TK\GitHubWebhook\Util;

readonly class Target
{
    public string $label;
    public string $ref;
    public string $sha;
    public User $user;
    public Repository|null $repo;

    public static function fromArray(array $data): Target
    {
        $instance = new Target();
        $instance->label = $data["label"];
        $instance->ref = $data["ref"];
        $instance->sha = $data["sha"];
        $instance->user = Util::getArgSafe($data, "user", User::fromArray(...));
        $instance->repo = Util::getArgSafe($data, "repo", Repository::fromArray(...));
        return $instance;
    }
}
