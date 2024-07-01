<?php

namespace TK\GitHubWebhook\Model\Ping;

readonly class LastResponse
{
    public null $code;
    public string $status;
    public null $message;

    public static function fromArray(?array $data): LastResponse
    {
        $instance = new LastResponse();
        $instance->code = $data["code"];
        $instance->status = $data["status"];
        $instance->message = $data["message"];
        return $instance;
    }
}
