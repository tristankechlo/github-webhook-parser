<?php

namespace TK\GitHubWebhook\Model\Common;

enum MilestoneState: string
{
    case OPEN = "open";
    case CLOSED = "closed";
}

/** A collection of related issues and pull requests. */
readonly class Milestone
{
    public string $url;
    public string $html_url;
    public string $labels_url;
    public int $id;
    public string $node_id;
    /** The number of the milestone. */
    public int $number;
    /** The title of the milestone. */
    public string $title;
    public string|null $description;
    public User $creator;
    public int $open_issues;
    public int $closed_issues;
    /** The state of the milestone. */
    public MilestoneState $state;
    public string $created_at;
    public string $updated_at;
    public string|null $due_on;
    public string|null $closed_at;

    public static function fromArray(array $data): Milestone
    {
        $instance = new Milestone();
        $instance->url = $data["url"];
        $instance->html_url = $data["html_url"];
        $instance->labels_url = $data["labels_url"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->number = $data["number"];
        $instance->title = $data["title"];
        $instance->description = $data["description"] ?? null;
        $instance->creator = User::fromArray($data["creator"]);
        $instance->open_issues = $data["open_issues"];
        $instance->closed_issues = $data["closed_issues"];
        $instance->state = MilestoneState::from($data["state"]);
        $instance->created_at = $data["created_at"];
        $instance->updated_at = $data["updated_at"];
        $instance->due_on = $data["due_on"] ?? null;
        $instance->closed_at = $data["url"] ?? null;
        return $instance;
    }
}