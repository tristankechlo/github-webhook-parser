<?php

namespace TK\GitHubWebhook\Event;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Model\Common\Label;
use TK\GitHubWebhook\Model\Label\Changes;
use TK\GitHubWebhook\Model\Label\EventTypes;
use TK\GitHubWebhook\Util;

class LabelEvent extends AbstractEvent
{
    public EventTypes $action;
    /** The label that was added/removed/edited. */
    public Label $label;
    /** The changes to the label if the action was `edited`. */
    public Changes $changes;

    public static function fromArray(array $data): LabelEvent
    {
        /** @var LabelEvent $instance */
        $instance = AbstractEvent::createInstance($data, LabelEvent::class);
        $instance->action = EventTypes::from($data["action"]);
        $instance->label = Util::getArgSafe($data, "label", Label::fromArray(...));
        return $instance;
    }
}
