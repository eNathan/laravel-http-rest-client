# laravel-http-rest-client
Simple HTTP rest client for Laravel by eNathan

## Installation via Composer

Add the following to your `composer.json`'s dependency list:

        "require": {
            "enathan/laravel-http-rest-client"
        }
### Update Composer

In the root directory of your Laravel project (where `composer.json` is located), run:

    composer update

## Add Service Provider ##

Open `config/app.php` and add the following line to the `providers` array:

    $providers => [
    ... ,
    'App\Providers\LaravelHttpRestClient'
    ];

## Usage ##
The RestClient is a singleton registered in Laravel's IoC as `HttpRestClient`. You can access the rest client by using `\App::make('HttpRestClient')`.

## Example ##

    $RestClient = \App::make('HttpRestClient');
    $response = $RestClient->get('http://my_rest_server.com/',
        array(
            'username': 'foo',
            'password': 'bar
        )
    );
