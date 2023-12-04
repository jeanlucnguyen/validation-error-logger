<?php

namespace IcarusMedia\ValidationErrorLogger;

use Illuminate\Support\ServiceProvider;
use RuntimeException;

class ValidationErrorLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    protected function publishMigrations(): void
    {
        if (! $this->migrationExists('create_validation_error_logs_table.php')) {
            $this->publishes(
                [
                    __DIR__.'/../database/migrations/create_validation_error_logs_table.php.stub' => database_path('migrations/'.now()->format('Y_m_d_His').'_create_validation_error_logs_table.php'),
                ],
                'validation-error-logger-migrations'
            );
        }
    }

    protected function migrationExists(string $str): bool
    {
        $path = database_path('migrations/');
        $files = scandir($path);

        if ($files === false) {
            throw new RuntimeException('Unable to scan database dir');
        }

        $pos = false;
        foreach ($files as $file) {
            $pos = strpos($file, $str);
            if ($pos !== false) {
                return true;
            }
        }

        return false;
    }
}
