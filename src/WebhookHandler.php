<?php

namespace TK\GitHubWebhook;

use TK\GitHubWebhook\Event\AbstractEvent;
use TK\GitHubWebhook\Event\EventTypes;
use TK\GitHubWebhook\Exception\SignatureMismatchException;
use TK\GitHubWebhook\Exception\WebhookException;
use TK\GitHubWebhook\Exception\WebhookParseException;
use TK\GitHubWebhook\Handler\DefaultHandler;
use TK\GitHubWebhook\Handler\EventHandlerInterface;


class WebhookHandler
{
    private EventTypes $event;
    private string|null $secret = null;
    /** @var \TK\GitHubWebhook\Handler\EventHandlerInterface[] $handler */
    private array $handler = [];

    public function __construct()
    {
        try {
            $this->event = EventTypes::from($_SERVER['HTTP_X_GITHUB_EVENT']);
        } catch (\Throwable $e) {
            throw new WebhookException("Event '" . $_SERVER['HTTP_X_GITHUB_EVENT'] . "' is not yet supported!");
        }
    }

    public function setSecret(string|null $secret)
    {
        $this->secret = $secret;
    }

    public function registerHandler(EventHandlerInterface $handler)
    {
        $this->handler[] = $handler;
    }

    public function registerHandlers(array $handlers)
    {
        $this->handler = array_merge($this->handler, $handlers);
    }

    public function handle(): never
    {
        // read and parse json
        $json = $this->readAndVerifyJson();
        if ($json === null or !is_array($json)) {
            throw new WebhookParseException("Data was not read correctly!");
        }
        $input = $this->parse((array) $json);
        if ($input === null or !is_object($input) or !($input instanceof AbstractEvent)) {
            throw new WebhookParseException("Data was not parsed correctly!");
        }

        // get correct handler
        $target_handlers = array_filter($this->handler, function (EventHandlerInterface $e) {
            return in_array(EventTypes::ALL, $e->getTargetEvent()) or in_array($this->event, $e->getTargetEvent());
        });
        // add default handler if none found
        if (count($target_handlers) === 0) {
            $target_handlers[] = new DefaultHandler();
        }

        $response = new Response();
        foreach ($target_handlers as $handler) {
            if (!($handler instanceof EventHandlerInterface)) {
                throw new WebhookException("Regsitered handler '" . get_class($handler) . "' is not of correct type 'EventHandlerInterface'.");
            }
            $response = $handler->handleEvent($this->event, $input, $response);
        }

        header($response->getFormattedHeader());
        exit($response->getMessage());
    }

    private function readAndVerifyJson(): array|null
    {
        $json_raw = file_get_contents("php://input");

        if ($json_raw === false or empty($json_raw)) {
            throw new WebhookException("No input data found!");
        }

        if ($this->secret != null) {
            $this->verifySignature($json_raw, $this->secret);
        }

        return json_decode($json_raw, true);
    }

    private function verifySignature(string $json_raw, string $token): void
    {
        $signature = "sha256=" . hash_hmac("sha256", $json_raw, $token);
        $signature_got = $_SERVER['HTTP_X_HUB_SIGNATURE_256'];

        if (!hash_equals($signature, $signature_got)) {
            throw new SignatureMismatchException("Unauthorized: Signatures did not match");
        }
    }

    private function parse(array $json): AbstractEvent|null
    {
        // ping => PingEvent
        // pull_request => PullRequestEvent
        $target_parser = preg_replace("/[^a-z\_]/", "", $this->event->value);
        $target_parser = explode("_", trim($target_parser));
        $target_parser = array_map(fn ($str): string => ucfirst($str), $target_parser);
        $target_parser = implode($target_parser) . "Event";
        $target_parser = "TK\\GitHubWebhook\\Event\\" . $target_parser; // TODO redo

        // check if class exists and has static function 'fromArray'
        if (!class_exists($target_parser)) {
            throw new WebhookParseException("Class $target_parser is not available!");
        }
        if (!method_exists($target_parser, "fromArray")) {
            throw new WebhookParseException("Class $target_parser does not have the static method 'fromArray'!");
        }

        // parse as object
        return call_user_func([$target_parser, "fromArray"], $json);
    }
}
