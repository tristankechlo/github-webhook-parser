<?php

namespace TK\GitHubWebhook\Model\Ping;

enum WebhookConfigType: string
{
    case JSON = "json";
    case FORM = "form";
}

readonly class WebhookConfig
{
    /** The media type used to serialize the payloads. Supported values include `json` and `form`. The default is `form`. */
    public WebhookConfigType $content_type;
    /** 
     * Determines whether the SSL certificate of the host for `url` will be verified when delivering payloads.
     * Supported values include `0` (verification is performed) and `1` (verification is not performed). The default is `0`.
     */
    public string $insecure_ssl;
    /** If provided, the `secret` will be used as the `key` to generate the HMAC hex digest value for [delivery signature headers](https://docs.github.com/webhooks/event-payloads/#delivery-headers). */
    public string|null $secret;
    /** The URL to which the payloads will be delivered. */
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
