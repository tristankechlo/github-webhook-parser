<?php

namespace TK\GitHubWebhook\Event;

enum EventTypes: string
{
    case ALL = "all";
    case PING = "ping";
    case ISSUE = "issues";
    case PULL_REQUEST = "pull_request";
    case FORK = "fork";
    case PUSH = "push";
    case STAR = "star";
    case WATCH = "watch";
}
