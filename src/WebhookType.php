<?php

namespace TK\GitHubWebhook;

// used to determine where the webhook is installed
enum WebhookType: string
{
    case REPOSITORY = "repository";
    case ORGANIZATION = "organization";
}
