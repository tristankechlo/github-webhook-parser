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
        $instance = new Permissions();
        $instance->actions = PermissionState::tryFrom($data["actions"]);
        $instance->administration = PermissionState::tryFrom($data["administration"]);
        $instance->blocking = PermissionState::tryFrom($data["blocking"]);
        $instance->checks = PermissionState::tryFrom($data["checks"]);
        $instance->content_references = PermissionState::tryFrom($data["content_references"]);
        $instance->contents = PermissionState::tryFrom($data["contents"]);
        $instance->deployments = PermissionState::tryFrom($data["deployments"]);
        $instance->discussions = PermissionState::tryFrom($data["discussions"]);
        $instance->emails = PermissionState::tryFrom($data["emails"]);
        $instance->environments = PermissionState::tryFrom($data["environments"]);
        $instance->followers = PermissionState::tryFrom($data["followers"]);
        $instance->gpg_keys = PermissionState::tryFrom($data["gpg_keys"]);
        $instance->interaction_limits = PermissionState::tryFrom($data["interaction_limits"]);
        $instance->issues = PermissionState::tryFrom($data["issues"]);
        $instance->keys = PermissionState::tryFrom($data["keys"]);
        $instance->members = PermissionState::tryFrom($data["members"]);
        $instance->merge_queues = PermissionState::tryFrom($data["merge_queues"]);
        $instance->metadata = PermissionState::tryFrom($data["metadata"]);
        $instance->organization_administration = PermissionState::tryFrom($data["organization_administration"]);
        $instance->organization_hooks = PermissionState::tryFrom($data["organization_hooks"]);
        $instance->organization_packages = PermissionState::tryFrom($data["organization_packages"]);
        $instance->organization_plan = PermissionState::tryFrom($data["organization_plan"]);
        $instance->organization_projects = PermissionState::tryFrom($data["organization_projects"]);
        $instance->organization_secrets = PermissionState::tryFrom($data["organization_secrets"]);
        $instance->organization_self_hosted_runners = PermissionState::tryFrom($data["organization_self_hosted_runners"]);
        $instance->organization_user_blocking = PermissionState::tryFrom($data["organization_user_blocking"]);
        $instance->packages = PermissionState::tryFrom($data["packages"]);
        $instance->plan = PermissionState::tryFrom($data["plan"]);
        $instance->pull_requests = PermissionState::tryFrom($data["pull_requests"]);
        $instance->repository_hooks = PermissionState::tryFrom($data["repository_hooks"]);
        $instance->repository_projects = PermissionState::tryFrom($data["repository_projects"]);
        $instance->secret_scanning_alerts = PermissionState::tryFrom($data["secret_scanning_alerts"]);
        $instance->single_file = PermissionState::tryFrom($data["single_file"]);
        $instance->starring = PermissionState::tryFrom($data["starring"]);
        $instance->statues = PermissionState::tryFrom($data["statues"]);
        $instance->team_discussions = PermissionState::tryFrom($data["team_discussions"]);
        $instance->vulnerability_alerts = PermissionState::tryFrom($data["vulnerability_alerts"]);
        $instance->watching = PermissionState::tryFrom($data["watching"]);
        $instance->workflows = PermissionState::tryFrom($data["workflows"]);
        return $instance;
    }
}