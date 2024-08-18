<?php

namespace TK\GitHubWebhook\Model\Release;

enum EventTypes: string
{
    case CREATED = "created";
    case DELETED = "deleted";
    case EDITED = "edited";
    case PRERELEASED = "prereleased";
    case PUBLISHED = "published";
    case RELEASED = "released";
    case UNPUBLISHED = "unpublished";
}
