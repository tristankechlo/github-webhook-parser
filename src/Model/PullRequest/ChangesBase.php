<?php

namespace TK\GitHubWebhook\Model\PullRequest;

use TK\GitHubWebhook\Model\Issue\From;
use TK\GitHubWebhook\Util;

readonly class ChangesBase
{
    public From $ref;
    public From $sha;

    public static function fromArray(array $data): ChangesBase
    {
        $instance = new ChangesBase();
        $instance->ref = Util::getArgSafe($data, "ref", From::fromArray(...));
        $instance->sha = Util::getArgSafe($data, "sha", From::fromArray(...));
        return $instance;
    }
}
