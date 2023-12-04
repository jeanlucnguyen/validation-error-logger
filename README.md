# Validation Error Logger

[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/icarusmedia/validation-error-logger/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/icarusmedia/validation-error-logger/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/icarusmedia/validation-error-logger/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/icarusmedia/validation-error-logger/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)

## Installation

You can install the package via composer:

```bash
composer require icarusmedia/validation-error-logger
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="validation-error-logger-migrations"
php artisan migrate
```
