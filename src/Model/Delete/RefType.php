<?php

namespace TK\GitHubWebhook\Model\Delete;

enum RefType: string
{
    case TAG = "tag";
    case BRANCH = "branch";
}
