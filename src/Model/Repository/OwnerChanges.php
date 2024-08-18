<?php

namespace TK\GitHubWebhook\Model\Repository;

use TK\GitHubWebhook\Util;

/**
 * UserFrom
 * 
 * contains the previous owner of this repository
 */
readonly class OwnerChanges
{
    public UserFrom $from;

    public static function fromArray(array $data): OwnerChanges
    {
        $instance = new OwnerChanges();
        $instance->from = Util::getArgSafe($data, "from", UserFrom::fromArray(...));
        return $instance;
    }
}
