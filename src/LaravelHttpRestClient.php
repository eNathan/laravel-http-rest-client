<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelHttpRestClient extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->singleton('HttpRestClient', function($app){
			return new \App\Providers\RestClient();
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
