<?php

namespace TK\GitHubWebhook\Model\Issue;

use TK\GitHubWebhook\Model\Common\From;
use TK\GitHubWebhook\Model\Common\Issue;
use TK\GitHubWebhook\Model\Common\Repository;
use TK\GitHubWebhook\Util;

readonly class Changes
{
    public From|null $body;
    public From|null $title;
    public Issue|null $old_issue;
    public Repository|null $old_repository;
    public Issue|null $new_issue;
    public Repository|null $new_repository;

    public static function fromArray(array $data): Changes
    {
        $instance = new Changes();
        $instance->body = Util::getArgSafe($data, "body", From::fromArray(...));
        $instance->title = Util::getArgSafe($data, "title", From::fromArray(...));
        $instance->old_issue = Util::getArgSafe($data, "old_issue", Issue::fromArray(...));
        $instance->old_repository = Util::getArgSafe($data, "old_repository", Repository::fromArray(...));
        $instance->new_issue = Util::getArgSafe($data, "new_issue", Issue::fromArray(...));
        $instance->new_repository = Util::getArgSafe($data, "new_repository", Repository::fromArray(...));
        return $instance;
    }
}