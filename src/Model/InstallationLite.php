<?php

namespace TK\GitHubWebhook\Model;

readonly class InstallationLite
{
    public int $id;
    public string $node_id;

    public static function fromArray(array $data): InstallationLite
    {
    }
}
