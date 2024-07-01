<?php

namespace TK\GitHubWebhook\Model;

readonly class User
{
	public string $login;
	public int $id;
	public string $node_id;
	public string|null $name;
	public string|null $email;
	public string $avatar_url;
	public string $gravatar_id;
	public string $url;
	public string $html_url;
	public string $followers_url;
	public string $following_url;
	public string $gists_url;
	public string $starred_url;
	public string $subscriptions_url;
	public string $organizations_url;
	public string $repos_url;
	public string $events_url;
	public string $received_events_url;
	public string $type;
	public bool $site_admin;

	public static function fromArray(array $data): User
	{
		$instance = new User();
		$instance->login = $data["login"];
		$instance->id = $data["id"];
		$instance->node_id = $data["node_id"];
		$instance->name = $data["name"] ?? null;
		$instance->email = $data["email"] ?? null;
		$instance->avatar_url = $data["avatar_url"];
		$instance->gravatar_id = $data["gravatar_id"];
		$instance->url = $data["url"];
		$instance->html_url = $data["html_url"];
		$instance->followers_url = $data["followers_url"];
		$instance->following_url = $data["following_url"];
		$instance->gists_url = $data["gists_url"];
		$instance->starred_url = $data["starred_url"];
		$instance->subscriptions_url = $data["subscriptions_url"];
		$instance->organizations_url = $data["organizations_url"];
		$instance->repos_url = $data["repos_url"];
		$instance->events_url = $data["events_url"];
		$instance->received_events_url = $data["received_events_url"];
		$instance->type = $data["type"];
		$instance->site_admin = $data["site_admin"];
		return $instance;
	}
}
