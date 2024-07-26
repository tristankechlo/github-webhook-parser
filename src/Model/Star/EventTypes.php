<?php

namespace TK\GitHubWebhook\Model\Star;

enum EventTypes: string
{
    case CREATED = "created";
    case DELETED = "deleted";
}
