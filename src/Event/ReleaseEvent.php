<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Model\Common\Release;
use TK\GitHubWebhook\Model\Release\Changes;
use TK\GitHubWebhook\Model\Release\EventTypes;
use TK\GitHubWebhook\Util;

class ReleaseEvent extends AbstractEvent
{
    public EventTypes $action;
    public Release $release;
    public Changes|null $changes;

    public static  function fromArray(array $data): ReleaseEvent
    {
        /** @var ReleaseEvent $instance */
        $instance = AbstractEvent::createInstance($data, ReleaseEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        $instance->release = Util::getArgSafe($data, "release", Release::fromArray(...));
        $instance->changes = Util::getArgSafe($data, "changes", Changes::fromArray(...));
        return $instance;
    }
}
