<?php

namespace TK\GitHubWebhook\Model\Issue;

enum AuthorAssociation: string
{
    case COLLABORATOR = "COLLABORATOR";
    case CONTRIBUTOR = "CONTRIBUTOR";
    case FIRST_TIMER = "FIRST_TIMER";
    case FIRST_TIME_CONTRIBUTOR = "FIRST_TIME_CONTRIBUTOR";
    case MANNEQUIN = "MANNEQUIN";
    case MEMBER = "MEMBER";
    case NONE = "NONE";
    case OWNER = "OWNER";
}
