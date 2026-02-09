# laravel-itop

DB-first Laravel package to integrate with iTop installations and forward tickets A → B.

Quick start:

1. Add package to your project (local path or publish to packagist).
2. Publish config: `php artisan vendor:publish --provider="Pringgojs\\LaravelItop\\LaravelItopServiceProvider" --tag=config`
3. Configure `config/itop.php` with your `instances` and `flows`.
4. Run migrations: `php artisan migrate` (migrations are loaded from the package).

This initial scaffold implements DB drivers, a forwarder service and queued job.
