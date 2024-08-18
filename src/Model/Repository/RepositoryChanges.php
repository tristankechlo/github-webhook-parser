<?php

namespace TK\GitHubWebhook\Model\Repository;

use TK\GitHubWebhook\Model\Common\From;
use TK\GitHubWebhook\Util;

/**
 * RepositoryChanges
 * 
 * contains the previous name of this repository
 */
readonly class RepositoryChanges
{
    public From $name;

    public static function fromArray(array $data): RepositoryChanges
    {
        $instance = new RepositoryChanges();
        $instance->name = Util::getArgSafe($data, "name", From::fromArray(...));
        return $instance;
    }
}
