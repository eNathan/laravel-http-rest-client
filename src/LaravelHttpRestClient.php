<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class testRestClient {
	function test(){
		return "omfg";
	}
}

class LaravelHttpRestClient extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->singleton('\TestRestClient', function($app){
			return new testRestClient();
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
