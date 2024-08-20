# Changelog

## 1.2.1 - 2024-08-20

- pass header `X-GitHub-Delivery` as `event_uuid` through the request
- pass header `X-GitHub-Hook-Installation-Target-Type` as `webhook_type` through the request

## 1.2.0 - 2024-08-18

- support for all `create` events
- support for all `delete` events
- support for all `label` events
- move some models into common namespace
- support for all `release` events
- support for all `issue_comment` events
- support for all `repository` events
- refactor how default values are parsed
- support for `gollum` event
- add doc comments
- create seperate class for organization
- fix parsing of `before` and `after` of the `PullRequestEvent`

## 1.1.2 - 2024-07-26

- combine inputs into Request class

## 1.1.1 - 2024-07-26

- add option to register handler that get's executed when the event is unknown

## 1.1.0 - 2024-07-26

- support for all `issue` events
- support for all `pull_request` events
- support for the `fork` event
- support for the `push` event
- support for the `star` event
- support for the `watch` event

## 1.0.0 - 2024-07-25

- first version
- support for the event `ping`
