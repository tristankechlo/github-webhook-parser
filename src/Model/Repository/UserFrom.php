<?php

namespace TK\GitHubWebhook\Model\Repository;

use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

readonly class UserFrom
{
    public User $user;

    public static function fromArray(array $data): UserFrom
    {
        $instance = new UserFrom();
        $instance->user = Util::getArgSafe($data, "user", User::fromArray(...));
        return $instance;
    }
}
