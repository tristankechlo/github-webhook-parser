<?php

namespace TK\GitHubWebhook\Model\Label;

enum EventTypes: string
{
    case CREATED = "created";
    case DELETED = "deleted";
    case EDITED = "edited";
}
