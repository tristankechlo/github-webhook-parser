<?php

namespace TK\GitHubWebhook\Model\Common;

readonly class Reactions
{
    public string $url;
    public int $total_count;
    public int $plus_one;
    public int $minus_one;
    public int $laugh;
    public int $hooray;
    public int $confused;
    public int $heart;
    public int $rocket;
    public int $eyes;

    public static function fromArray(array $data): Reactions
    {
        $instance = new Reactions();
        $instance->url = $data["url"];
        $instance->total_count = $data["total_count"];
        $instance->plus_one = $data["+1"];
        $instance->minus_one = $data["-1"];
        $instance->laugh = $data["laugh"];
        $instance->hooray = $data["hooray"];
        $instance->confused = $data["confused"];
        $instance->heart = $data["heart"];
        $instance->rocket = $data["rocket"];
        $instance->eyes = $data["eyes"];
        return $instance;
    }
}