<?php

namespace TK\GitHubWebhook\Model\Common;

/** Installation */
readonly class InstallationLite
{
    /** The ID of the installation. */
    public int $id;
    public string $node_id;

    public static function fromArray(array $data): InstallationLite
    {
        $instance = new InstallationLite();
        $instance->id = $data["id"];
        $instance->node_id = $data["node_id"];
        return $instance;
    }
}
