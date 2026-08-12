# Changelog

All notable changes to this project are documented here.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

First release of `idiot/zabbixapi`, a token-only Zabbix JSON-RPC API client for PHP.

### Added
- JSON-RPC 2.0 transport layer with immutable `Request` and `Response` value objects.
- Guzzle-based `HttpClient` and `JsonRpcClient`, with dedicated credentials handling.
- Generated, typed request layer backed by PHP enums, plus imported Zabbix API schemas for request validation.
- Typed API facade exposing bound API groups directly on the client (e.g. `$api->hosts->get(...)`).
- Fluent request helpers: `filter()`, `with()`, and `output()`.
- PHPUnit test suite.

### Changed
- Rewired `ZabbixApi` onto the new transport; all calls now route through typed request objects.
- Claimed the `Idiot\Zabbix` namespace; package renamed to `idiot/zabbixapi`.
- Rewrote the README for the token-only client and split it into chapters.

### Removed
- **BREAKING:** session cache and username/password authentication (`login()` / `logout()`) — an API token is now required.
- Bundled `README.pdf`.
