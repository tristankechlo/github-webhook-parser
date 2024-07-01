<?php

namespace TK\GitHubWebhook\Model;

enum MilestoneState: string
{
    case OPEN = "open";
    case CLOSED = "closed";
}

readonly class Milestone
{
    public string $url;
    public string $html_url;
    public string $labels_url;
    public int $id;
    public string $node_id;
    public int $number;
    public string $title;
    public string|null $description;
    public User $creator;
    public int $open_issues;
    public int $closed_issues;
    public MilestoneState $state;
    public string $created_at;
    public string $updated_at;
    public string|null $due_on;
    public string|null $closed_at;

    public static function fromArray(array $data): Milestone
    {
    }
}