<?php

namespace TK\GitHubWebhook\Model\Repository;

use TK\GitHubWebhook\Model\Common\From\ArrayFrom;
use TK\GitHubWebhook\Model\Common\From\From;
use TK\GitHubWebhook\Model\Common\From\OptionalFrom;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    public OptionalFrom|null $description;
    public From|null $default_branch;
    public OptionalFrom|null $homepage;
    public ArrayFrom|null $topics;
    public RepositoryChanges|null $repository;
    public OwnerChanges|null $owner;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->description = Util::getArgSafe($data, "description", OptionalFrom::fromArray(...));
        $instance->default_branch = Util::getArgSafe($data, "default_branch", From::fromArray(...));
        $instance->homepage = Util::getArgSafe($data, "homepage", OptionalFrom::fromArray(...));
        $instance->topics = Util::getArgSafe($data, "topics", ArrayFrom::fromArray(...));
        $instance->repository = Util::getArgSafe($data, "repository", RepositoryChanges::fromArray(...));
        $instance->owner = Util::getArgSafe($data, "owner", OwnerChanges::fromArray(...));
        return $instance;
    }
}
