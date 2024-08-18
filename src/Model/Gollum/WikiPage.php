<?php

namespace TK\GitHubWebhook\Model\Gollum;

enum WikiPageAction: string
{
    case CREATED = "created";
    case EDITED = "edited";
}

readonly class WikiPage
{
    /** The name of the page. */
    public string $page_name;
    /** The current page title. */
    public string $title;
    /**
     * according to spec: always null, 
     * try parsing anyway, incase a value is there
     */
    public string|null $summary;
    /** The action that was performed on the page. Can be `created` or `edited`. */
    public WikiPageAction $action;
    /** The latest commit SHA of the page. */
    public string $sha;
    /** Points to the HTML wiki page. */
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
