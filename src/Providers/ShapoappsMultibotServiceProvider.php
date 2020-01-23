<?php

namespace Shapoapps\MultibotDriver\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Shapoapps\MultibotDriver\ShapoappsMultibotDriver;
use Shapoapps\MultibotDriver\SessionControllers\MessengerSessionManager;
use Shapoapps\MultibotDriver\middleware\StartMessengerSession;
use Shapoapps\MultibotDriver\SessionControllers\MessengerStore;


class ShapoappsMultibotServiceProvider extends ServiceProvider
{

    public function boot(Request $request)
    {
        $this->publishes(
            [ __DIR__.'/../../stubs/config/' => config_path(),], 'shapoapps/multibot_driver');

        $this->publishes(
            [ __DIR__.'/../../stubs/sessions/' => config_path().('/../storage/framework'),], 'shapoapps/session_manager');


        ShapoappsMultibotDriver::multibot_handler($request);

	if(ShapoappsMultibotDriver::CheckIsMessengerSessionManagerEnabled()) {
    	    $this->app->make(MessengerSessionManager::class);
	}
    }


    public function register()
    {
        if(ShapoappsMultibotDriver::CheckIsMessengerSessionManagerEnabled()) {
            $this->registerMessengerSessionManager();
            $this->registerMessengerSessionDriver();
            $this->app->singleton(StartMessengerSession::class);

            $this->registerSessionDriverInterface();

            $kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
            $kernel->pushMiddleware(\Shapoapps\MultibotDriver\middleware\StartMessengerSession::class);
        }
    }


    protected function registerSessionDriverInterface()
    {
        $this->app->bind('session_driver_interface', function ($app) {
            return $this->app->make(MessengerSessionManager::class)->driver();
        });
    }



    protected function registerMessengerSessionManager()
    {
        $this->app->singleton(MessengerSessionManager::class, function ($app) {
            return new MessengerSessionManager($app);
        });
    }



    protected function registerMessengerSessionDriver()
    {
        $this->app->singleton(MessengerStore::class, function ($app) {
            return $app->make(MessengerSessionManager::class)->driver();
        });
    }

}


