<?php

namespace TK\GitHubWebhook\Model\App;

enum PermissionState: string
{
    case READ = "read";
    case WRITE = "write";
}

readonly class Permissions
{
    public PermissionState|null $actions;
    public PermissionState|null $administration;
    public PermissionState|null $blocking;
    public PermissionState|null $checks;
    public PermissionState|null $content_references;
    public PermissionState|null $contents;
    public PermissionState|null $deployments;
    public PermissionState|null $discussions;
    public PermissionState|null $emails;
    public PermissionState|null $environments;
    public PermissionState|null $followers;
    public PermissionState|null $gpg_keys;
    public PermissionState|null $interaction_limits;
    public PermissionState|null $issues;
    public PermissionState|null $keys;
    public PermissionState|null $members;
    public PermissionState|null $merge_queues;
    public PermissionState|null $metadata;
    public PermissionState|null $organization_administration;
    public PermissionState|null $organization_hooks;
    public PermissionState|null $organization_packages;
    public PermissionState|null $organization_plan;
    public PermissionState|null $organization_projects;
    public PermissionState|null $organization_secrets;
    public PermissionState|null $organization_self_hosted_runners;
    public PermissionState|null $organization_user_blocking;
    public PermissionState|null $packages;
    public PermissionState|null $plan;
    public PermissionState|null $pull_requests;
    public PermissionState|null $repository_hooks;
    public PermissionState|null $repository_projects;
    public PermissionState|null $secret_scanning_alerts;
    public PermissionState|null $single_file;
    public PermissionState|null $starring;
    public PermissionState|null $statues;
    public PermissionState|null $team_discussions;
    public PermissionState|null $vulnerability_alerts;
    public PermissionState|null $watching;
    public PermissionState|null $workflows;

    public static function fromArray(array $data): Permissions
    {
    }
}