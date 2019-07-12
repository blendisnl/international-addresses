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

        validator()->extend('international_address', function ($attribute, $value, $parameters) {
            return (new AddressValidator(request()))->passes($attribute, $value, $parameters);
        });
    }
}
