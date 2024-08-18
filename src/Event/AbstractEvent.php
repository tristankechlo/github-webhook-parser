<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;

abstract class AbstractEvent
{
    public Repository|null $repository;
    public User|null $sender;
    public User|null $organization;

    protected function __construct(Repository|null $repository, User|null $sender, User|null $organization)
    {
        $this->repository = $repository;
        $this->sender = $sender;
        $this->organization = $organization;
    }

    public function getSender(): User|null
    {
        return $this->sender;
    }

    public function getRepository(): Repository|null
    {
        return $this->repository;
    }

    public function getOrganization(): User|null
    {
        return $this->organization;
    }
}
