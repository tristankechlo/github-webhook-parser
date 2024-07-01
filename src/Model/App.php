<?php

namespace TK\GitHubWebhook\Model;

use TK\GitHubWebhook\Model\App\Permissions;

readonly class App
{
    public int $id;
    public string|null $slug;
    public string $node_id;
    public User $owner;
    public string $name;
    public string|null $description;
    public string $external_url;
    public string $html_url;
    public string $created_at;
    public string $updated_at;
    public Permissions|null $permissions;
    /** @var \TK\GitHubWebhook\Model\App\AppEvent[] $events */
    public array $events;

    public static function fromArray(array $data): App
    {

    }
}