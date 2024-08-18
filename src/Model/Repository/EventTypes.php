<?php

namespace TK\GitHubWebhook\Model\Repository;

enum EventTypes: string
{
    case ARCHIVED = "archived";
    case CREATED = "created";
    case DELETED = "deleted";
    case EDITED = "edited";
    case PRIVATIZED = "privatized";
    case PUBLIZIED = "publicized";
    case RENAMED = "renamed";
    case TRANSFERRED = "transferred";
    case UNARCHIVED = "unarchived";
}
