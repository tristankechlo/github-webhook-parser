<?php

namespace TK\GitHubWebhook\Model\Issue;

readonly class PullRequestLite
{
    public string $url;
    public string $html_url;
    public string $diff_url;
    public string $patch_url;
    public string|null $merged_at;

    public static function fromArray(array $data): PullRequestLite
    {
        $instance = new PullRequestLite();
        $instance->url = $data["url"];
        $instance->html_url = $data["html_url"];
        $instance->diff_url = $data["diff_url"];
        $instance->patch_url = $data["patch_url"];
        $instance->merged_at = $data["merged_at"] ?? null;
        return $instance;
    }
}
