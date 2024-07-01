<?php

namespace TK\GitHubWebhook\Model\Issue;

enum LockReason: string
{
    case RESOLVED = "resolved";
    case OFF_TOPIC = "off-topic";
    case TOO_HEATED = "too heated";
    case SPAM = "spam";
}
