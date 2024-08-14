<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Model\Common\User;
use TK\GitHubWebhook\Util;

enum MergeMethod: string
{
    case MERGE = "merge";
    case SQUASH = "squash";
    case REBASE = "rebase";
}

/** The status of auto merging a pull request. */
readonly class AutoMerge
{
    public User|null $enabled_by;
    /** The merge method to use. */
    public MergeMethod $merge_method;
    /** Title for the merge commit message. */
    public string|null $commit_title;
    /** Commit message for the merge commit. */
    public string|null $commit_message;

    public static function fromArray(array $data): AutoMerge
    {
        $instance = new AutoMerge();
        $instance->enabled_by = Util::getArgSafe($data, "enabled_by", User::fromArray(...));
        $instance->merge_method = MergeMethod::from($data["merge_method"]);
        $instance->commit_title = $data["commit_title"] ?? null;
        $instance->commit_message = $data["commit_message"] ?? null;
        return $instance;
    }
}
