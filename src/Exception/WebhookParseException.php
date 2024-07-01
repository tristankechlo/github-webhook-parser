<?php

namespace TK\GitHubWebhook\Exception;

/**
 * thrown when the parsing of the input json did fail
 */
class WebhookParseException extends \Exception
{

    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}