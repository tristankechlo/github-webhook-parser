<?php

namespace TK\GitHubWebhook\Model\Create;

enum RefType: string
{
    case TAG = "tag";
    case BRANCH = "branch";
}
