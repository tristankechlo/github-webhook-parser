<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\InstallationLite;
use TK\GitHubWebhook\Model\Common\Issue;
use TK\GitHubWebhook\Model\Common\IssueComment;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Model\IssueComment\Changes;
use TK\GitHubWebhook\Model\IssueComment\EventTypes;
use TK\GitHubWebhook\Util;

class IssueCommentEvent extends AbstractEvent
{
    public EventTypes $action;
    public Issue $issue;
    public IssueComment $comment;
    public Changes|null $changes;

    public static function fromArray(array $data): IssueCommentEvent
    {
        $repository = Util::getArgSafe($data, "repository", Repository::fromArray(...));
        $sender = Util::getArgSafe($data, "sender", User::fromArray(...));
        $organization = Util::getArgSafe($data, "organization", User::fromArray(...));

        $instance = new IssueCommentEvent($repository, $sender, $organization);
        $instance->action = EventTypes::from($data["action"]);
        $instance->issue = Util::getArgSafe($data, "issue", Issue::fromArray(...));
        $instance->comment = Util::getArgSafe($data, "comment", IssueComment::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        $instance->installation = Util::getArgSafe($data, "installation", InstallationLite::fromArray(...));
        return $instance;
    }
}
