<?php

namespace TK\GitHubWebhook\Model\App;

enum AppEvent: string
{
    case BRANCH_PROTECTION_RULE = "branch_protection_rule";
    case CHECK_RUN = "check_run";
    case CHECK_SUITE = "check_suite";
    case CODE_SCANNING_ALERT = "code_scanning_alert";
    case COMMIT_COMMENT = "commit_comment";
    case CREATE = "create";
    case DELETE = "delete";
    case DEPENDABOT_ALERT = "dependabot_alert";
    case DEPLOYMENT = "deployment";
    case DEPLOYMENT_PROTECTION_RULE = "deployment_protection_rule";
    case DEPLOYMENT_REVIEW = "deployment_review";
    case DEPLOYMENT_STATUS = "deployment_status";
    case DEPLOY_KEY = "deploy_key";
    case DISCUSSION = "discussion";
    case DISCUSSION_COMMENT = "discussion_comment";
    case FORK = "fork";
    case GOLLUM = "gollum";
    case ISSUES = "issues";
    case ISSUE_COMMENT = "issue_comment";
    case LABEL = "label";
    case MEMBER = "member";
    case MEMBERSHIP = "membership";
    case MERGE_GROUP = "merge_group";
    case MERGE_QUEUE_ENTRY = "merge_queue_entry";
    case MILESTONE = "milestone";
    case ORGANIZATION = "organization";
    case ORG_BLOCK = "org_block";
    case PAGE_BUILD = "page_build";
    case PROJECT = "project";
    case PROJECTS_V2_ITEM = "projects_v2_item";
    case PROJECT_CARD = "project_card";
    case PROJECT_COLUMN = "project_column";
    case PUBLIC = "public";
    case PULL_REQUEST = "pull_request";
    case PULL_REQUEST_REVIEW = "pull_request_review";
    case PULL_REQUEST_REVIEW_COMMENT = "pull_request_review_comment";
    case PULL_REQUEST_REVIEW_THREAD = "pull_request_review_thread";
    case PUSH = "push";
    case REGISTRY_PACKAGE = "registry_package";
    case RELEASE = "release";
    case REPOSITORY = "repository";
    case REPOSITORY_DISPATCH = "repository_dispatch";
    case REPOSITORY_RULESET = "repository_ruleset";
    case SECRET_SCANNING_ALERT = "secret_scanning_alert";
    case SECRET_SCANNING_ALERT_LOCATION = "secret_scanning_alert_location";
    case SECURITY_AND_ANALYSIS = "security_and_analysis";
    case STAR = "star";
    case STATUS = "status";
    case TEAM = "team";
    case TEAM_ADD = "team_add";
    case WATCH = "watch";
    case WORKFLOW_DISPATCH = "workflow_dispatch";
    case WORKFLOW_JOB = "workflow_job";
    case WORKFLOW_RUN = "workflow_run";
}
