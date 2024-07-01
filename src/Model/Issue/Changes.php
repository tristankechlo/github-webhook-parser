<?php

namespace TK\GitHubWebhook\Model\Issue;

use TK\GitHubWebhook\Model\Issue;
use TK\GitHubWebhook\Model\Repository;

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
        $instance->body = array_key_exists("body", $data) ? From::fromArray($data["body"]) : null;
        $instance->title = array_key_exists("title", $data) ? From::fromArray($data["title"]) : null;
        $instance->old_issue = array_key_exists("old_issue", $data) ? Issue::fromArray($data["old_issue"]) : null;
        $instance->old_repository = array_key_exists("old_repository", $data) ? Repository::fromArray($data["old_repository"]) : null;
        $instance->new_issue = array_key_exists("new_issue", $data) ? Issue::fromArray($data["new_issue"]) : null;
        $instance->new_repository = array_key_exists("new_repository", $data) ? Repository::fromArray($data["new_repository"]) : null;
        return $instance;
    }
}