<?php
namespace Thiagoprz\Braspag;

use Illuminate\Support\ServiceProvider;

/**
 * @package Thiagoprz\CartaoProtegido
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
class BraspagServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishes configuration
        $this->publishes([
            __DIR__.'/../config/braspag.php' => config_path('braspag.php'),
        ]);
    }

}
