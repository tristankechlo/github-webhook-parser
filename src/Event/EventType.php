<?php

namespace TK\GitHubWebhook\Event;

enum EventType: string
{
    case ALL = "all";
    case PING = "ping";
    case ISSUE = "issue";
    case PULL_REQUEST = "pull_request";
    case FORK = "fork";
    case PUSH = "push";
    case STAR = "star";
    case WATCH = "watch";
}
