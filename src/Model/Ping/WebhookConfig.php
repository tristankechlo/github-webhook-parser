<?php

namespace TK\GitHubWebhook\Model\Ping;

enum WebhookConfigType: string
{
    case JSON = "json";
    case FORM = "form";
}

readonly class WebhookConfig
{
    public WebhookConfigType $content_type;
    public string $insecure_ssl;
    public string|null $secret;
    public string $url;

    public static function fromArray(array $data): WebhookConfig
    {
        $instance = new WebhookConfig();
        $instance->content_type = WebhookConfigType::from($data["content_type"]);
        $instance->insecure_ssl = $data["insecure_ssl"];
        $instance->secret = $data["secret"] ?? null;
        $instance->url = $data["url"];
        return $instance;
    }
}
