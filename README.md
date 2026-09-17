# WooCommerce Stop Spam Register

[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/tikhomirov/wp-wc-stop-spam-register-plugin/releases)
[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://php.net/)

Lightweight WooCommerce anti-spam plugin for user registration forms. Adds a nonce field populated via JavaScript and rejects registrations when the token is missing or invalid.

## Requirements

| Component | Minimum |
|-----------|---------|
| **WordPress** | 5.0 |
| **WooCommerce** | 3.0 |
| **PHP** | 7.4 |

## Features

- Hidden nonce field on the WooCommerce registration form
- JavaScript fills the field on page load
- Blocks bot registrations that do not execute JS
- Russian error message for failed attempts

## Installation

### Composer

```bash
composer require tikhomirov/wp-wc-stop-spam-register-plugin
```

### Manual

1. Download the [latest release](https://github.com/tikhomirov/wp-wc-stop-spam-register-plugin/releases).
2. Upload to `wp-content/plugins/wp-wc-stop-spam-register-plugin/`.
3. Activate **WooCommerce stop spam user registrations**.

## How it works

1. A hidden `stopper` field is rendered in the registration form.
2. Footer JavaScript sets the field value to a WordPress nonce.
3. On registration, the plugin verifies the nonce and rejects invalid submissions.

## License

GPL-2.0-or-later
