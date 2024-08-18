<?php

namespace TK\GitHubWebhook\Model\Common;

use TK\GitHubWebhook\Util;

/** The [release](https://docs.github.com/en/rest/reference/repos/#get-a-release) object. */
readonly class Release
{
    public string $url;
    public string $assets_url;
    public string $upload_url;
    public string $html_url;
    public int $id;
    public string $node_id;
    /** The name of the tag. */
    public string $tag_name;
    /** Specifies the commitish value that determines where the Git tag is created from. */
    public string $target_commitish;
    public string $name;
    /** Whether the release is a draft or published */
    public bool $draft;
    public User $author;
    /** Whether the release is identified as a prerelease or a full release. */
    public bool $prerelease;
    public string|null $created_at;
    public string|null $published_at;
    /** @var ReleaseAsset[] $assets */
    public array $assets;
    public string|null $tarball_url;
    public string|null $zipball_url;
    public string $body;
    public int|null $mentions_count;
    public Reactions|null $reactions;
    public string|null $discussion_url;

    public static function fromArray(array $data): Release
    {
        $instance = new Release();
        $instance->url = $data["url"];
        $instance->assets_url = $data["assets_url"];
        $instance->upload_url = $data["upload_url"];
        $instance->html_url = $data["html_url"];
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        $instance->tag_name = $data["tag_name"];
        $instance->target_commitish = $data["target_commitish"];
        $instance->name = $data["name"];
        $instance->draft = $data["draft"];
        $instance->author = Util::getArgSafe($data, "author", User::fromArray(...));
        $instance->prerelease = $data["prerelease"];
        $instance->created_at = $data["created_at"] ?? null;
        $instance->published_at = $data["published_at"] ?? null;
        $instance->assets = Util::getArray($data, "assets", ReleaseAsset::fromArray(...));
        $instance->tarball_url = $data["tarball_url"] ?? null;
        $instance->zipball_url = $data["zipball_url"] ?? null;
        $instance->body = $data["body"];
        $instance->mentions_count = $data["mentions_count"] ?? null;
        $instance->reactions = Util::getArgSafe($data, "reactions", Reactions::fromArray(...));
        $instance->discussion_url = $data["discussion_url"] ?? null;
        return $instance;
    }
}
