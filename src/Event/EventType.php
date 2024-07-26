<?php

namespace TK\GitHubWebhook\Event;

enum EventType: string
{
    case ALL = "all";
    case PING = "ping";
    case ISSUE = "issue";
}
