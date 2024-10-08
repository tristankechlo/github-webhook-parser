<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Organization;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

abstract class AbstractEvent
{
    public Repository|null $repository;
    public User|null $sender;
    public Organization|null $organization;
    /** never present in PingEvent */
    public InstallationLite|null $installation;

    protected function __construct(Repository|null $repository, User|null $sender, Organization|null $organization)
    {
        $this->repository = $repository;
        $this->sender = $sender;
        $this->organization = $organization;
    }

    protected static function createInstance(array $data, string $class): mixed
    {
        if (!class_exists($class)) {
            throw new \InvalidArgumentException("Class '$class' is not available!");
        }
        if (!is_subclass_of($class, AbstractEvent::class)) {
            throw new \InvalidArgumentException("Class '$class' is not a subclass of '" . AbstractEvent::class . "'");
        }
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", Organization::fromArray(...));

        /** @var AbstractEvent $instance */
        $instance = new $class($repository, $sender, $organization);
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }

    public function getSender(): User|null
    {
        return $this->sender;
    }

    public function getRepository(): Repository|null
    {
        return $this->repository;
    }

    public function getOrganization(): Organization|null
    {
        return $this->organization;
    }

    public function getInstallationLite(): InstallationLite|null
    {
        return $this->installation;
    }
}
