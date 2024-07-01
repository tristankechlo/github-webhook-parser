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
    }
}
