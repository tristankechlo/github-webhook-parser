<?php

namespace TK\GitHubWebhook\Model\Gollum;

enum WikiPageAction: string
{
    case CREATED = "created";
    case EDITED = "edited";
}

readonly class WikiPage
{
    public string $page_name;
    public string $title;
    public string|null $summary; // according to spec: always null
    public WikiPageAction $action;
    public string $sha;
    public string $html_url;

    public static function fromArray(array $data): WikiPage
    {
        $instance = new WikiPage();
        $instance->page_name = $data["page_name"];
        $instance->title = $data["title"];
        $instance->summary = $data["summary"] ?? null;
        $instance->action = WikiPageAction::from($data["action"]);
        $instance->sha = $data["sha"];
        $instance->html_url = $data["html_url"];
        return $instance;
    }
}
