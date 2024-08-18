<?php

namespace TK\GitHubWebhook\Model\IssueComment;

enum EventTypes: string
{
    case CREATED = "created";
    case DELETED = "deleted";
    case EDITED = "edited";
}
