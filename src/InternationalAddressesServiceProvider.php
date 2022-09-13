<?php
namespace BlendisNL\InternationalAddresses;

use BlendisNL\InternationalAddresses\Validation\AddressValidator;


/**
 * Class ServiceProvider
 * @package BlendisNL\InternationalAddresses
 */
class InternationalAddressesServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // @todo
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Create the views
        $viewPath = __DIR__.'/../resources/views';
        $this->loadViewsFrom($viewPath, 'international-addresses');
        $this->publishes([
            $viewPath => base_path('resources/views/vendor/international-addresses'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/international-addresses'),
        ]);

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'international-addresses');
    }
}
