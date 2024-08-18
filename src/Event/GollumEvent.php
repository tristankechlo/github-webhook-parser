<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Gollum\WikiPage;
use TK\GitHubWebhook\Util;

class GollumEvent extends AbstractEvent
{
    /** 
     * the pages that got updated
     * @var WikiPage[] $pages 
     */
    public array $pages;

    public static function fromArray(array $data): GollumEvent
    {
        /** @var GollumEvent $instance */
        $instance = AbstractEvent::createInstance($data, GollumEvent::class);
        $instance->pages = Util::getArraySafe($data, "pages", WikiPage::fromArray(...));
        return $instance;
    }
}
