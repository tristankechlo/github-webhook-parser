<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\Commit;
use TK\GitHubWebhook\Model\Common\Committer;
use TK\GitHubWebhook\Util;

class PushEvent extends AbstractEvent
{
    /** The full git ref that was pushed. Example: `refs/heads/main` or `refs/tags/v3.14.1`. */
    public string $ref;
    /** The SHA of the most recent commit on `ref` before the push. */
    public string $before;
    /** The SHA of the most recent commit on `ref` after the push. */
    public string $after;
    /** Whether this push created the `ref`. */
    public bool $created;
    /** Whether this push deleted the `ref`. */
    public bool $deleted;
    /** Whether this push was a force push of the `ref`. */
    public bool $forced;
    public string|null $base_ref;
    /**
     * URL that shows the changes in this `ref` update, from the `before` commit to the `after` commit.
     * For a newly created `ref` that is directly based on the default branch, this is the comparison between the head of the default branch and the `after` commit.
     * Otherwise, this shows all commits until the `after` commit.
     */
    public string $compare;
    /**
     * An array of commit objects describing the pushed commits.
     * (Pushed commits are all commits that are included in the `compare` between the `before` commit and the `after` commit.)
     * The array includes a maximum of 20 commits. If necessary, you can use the [Commits API](https://docs.github.com/en/rest/reference/repos#commits) to fetch additional commits.
     * This limit is applied to timeline events only and isn't applied to webhook deliveries. 
     * @var Commit[] $commits
     */
    public array|null $commits;
    /**
     * For pushes where `after` is or points to a commit object, an expanded representation of that commit.
     * For pushes where `after` refers to an annotated tag object, an expanded representation of the commit pointed to by the annotated tag.
     */
    public Commit|null $head_commit;
    public Committer $pusher;

    public static function fromArray(array $data): PushEvent
    {
        /** @var PushEvent $instance */
        $instance = AbstractEvent::createInstance($data, PushEvent::class);
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
        return $instance;
    }
}
