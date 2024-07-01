<?php

namespace TK\GitHubWebhook\Exception;

/**
 * thrown when the recieved signature from github did not match the calculated signature based on your secret
 */
class SignatureMismatchException extends \Exception
{

    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}