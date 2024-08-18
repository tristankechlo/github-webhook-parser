<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\Commit;
use TK\GitHubWebhook\Model\Common\Committer;
use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

class PushEvent extends AbstractEvent
{
    public string $ref;
    public string $before;
    public string $after;
    public bool $created;
    public bool $deleted;
    public bool $forced;
    public string|null $base_ref;
    public string $compare;
    /** @var Commit[] $commits */
    public array|null $commits;
    public Commit|null $head_commit;
    public Committer $pusher;

    public static function fromArray(array $data): PushEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new PushEvent($repository, $sender, $organization);
        $instance->ref = $data["ref"];
        $instance->before = $data["before"];
        $instance->after = $data["after"];
        $instance->created = $data["created"];
        $instance->deleted = $data["deleted"];
        $instance->forced = $data["forced"];
        $instance->base_ref = $data["base_ref"] ?? null;
        $instance->compare = $data["compare"];
        $instance->commits = Util::getArraySafe($data, "commits", Commit::fromArray(...));
        $instance->head_commit = Util::getArgSafe($data, "head_commit", Commit::fromArray(...));
        $instance->pusher = Util::getArgSafe($data, "pusher", Committer::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
