# Changelog

All notable changes to this project will be documented in this file.

The format is based on "Keep a Changelog" and this file is intended for
human-readable release notes.

## [Unreleased]

## [1.0.0] - 2026-03-03

### Added

- Initial release.
- Eloquent models that map to common iTop tables (e.g. `Ticket`, `Attachment`, `Contact`).
- `Services\ApiService`: a minimal HTTP client for the iTop REST API (`callApi`).
- `Services\ItopServiceBuilder`: helpers to build payload arrays/JSON for ticket creation, attachments, and state updates.
- Utility traits and helpers for ticket relations, public logs, array handling, and response normalization.

### Notes

- This package is intentionally minimal: it does **not** provide migrations, default configuration values, or automatic synchronization/forwarding between iTop instances. The consuming application is responsible for DB schema, configuration, orchestration, and any queue/jobs.

---

For future releases, add entries under the appropriate version heading and date.
