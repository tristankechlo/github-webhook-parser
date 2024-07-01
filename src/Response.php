<?php

namespace TK\GitHubWebhook;

class Response
{
    /** the http status code to send to GitHub */
    private int $status_code = 200;
    /** a custom message to return (not related to the status code) */
    private string $message = "Successful";
    private bool $modified = false;

    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    public function setStatusCode(int $status_code): Response
    {
        $this->status_code = $status_code;
        $this->modified = true;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): Response
    {
        $this->message = $message;
        $this->modified = true;
        return $this;
    }

    public function getFormattedHeader(): string
    {
        $m = self::codeToStatusMessage($this->status_code);
        return "HTTP/1.1 " . $this->status_code . " " . $m;
    }

    public function isModified(): bool
    {
        return $this->modified;
    }

    public static function codeToStatusMessage(int $statusCode): string
    {
        switch ($statusCode) {
            case 100:
                return 'Continue';
            case 101:
                return 'Switching Protocols';
            case 200:
                return 'OK';
            case 201:
                return 'Created';
            case 202:
                return 'Accepted';
            case 203:
                return 'Non-Authoritative Information';
            case 204:
                return 'No Content';
            case 205:
                return 'Reset Content';
            case 206:
                return 'Partial Content';
            case 300:
                return 'Multiple Choices';
            case 301:
                return 'Moved Permanently';
            case 302:
                return 'Moved Temporarily';
            case 303:
                return 'See Other';
            case 304:
                return 'Not Modified';
            case 305:
                return 'Use Proxy';
            case 400:
                return 'Bad Request';
            case 401:
                return 'Unauthorized';
            case 402:
                return 'Payment Required';
            case 403:
                return 'Forbidden';
            case 404:
                return 'Not Found';
            case 405:
                return 'Method Not Allowed';
            case 406:
                return 'Not Acceptable';
            case 407:
                return 'Proxy Authentication Required';
            case 408:
                return 'Request Time-out';
            case 409:
                return 'Conflict';
            case 410:
                return 'Gone';
            case 411:
                return 'Length Required';
            case 412:
                return 'Precondition Failed';
            case 413:
                return 'Request Entity Too Large';
            case 414:
                return 'Request-URI Too Large';
            case 415:
                return 'Unsupported Media Type';
            case 500:
                return 'Internal Server Error';
            case 501:
                return 'Not Implemented';
            case 502:
                return 'Bad Gateway';
            case 503:
                return 'Service Unavailable';
            case 504:
                return 'Gateway Time-out';
            case 505:
                return 'HTTP Version not supported';
        }
        return "Unknown";
    }
}
