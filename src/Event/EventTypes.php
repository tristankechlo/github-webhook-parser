<?php

namespace TK\GitHubWebhook\Event;

enum EventTypes: string
{
    case ALL = "all";
    case CREATE = "create";
    case DELETE = "delete";
    case FORK = "fork";
    case GOLLUM = "gollum";
    case ISSUE = "issues";
    case ISSUE_COMMENT = "issue_comment";
    case LABEL = "label";
    case PING = "ping";
    case PULL_REQUEST = "pull_request";
    case PUSH = "push";
    case RELEASE = "release";
    case REPOSITORY = "repository";
    case STAR = "star";
    case WATCH = "watch";
}
