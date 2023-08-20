# laravel-antispam

## How to use:
1) Require the `cleantalk/laravel-antispam` module
2) Register the `CleantalkServiceProvider` service provider into your app.php
3) Register the `cleantalk_antispam` middleware into your  Kernel.php
4) Load the  publishes by  `php artisan vendor:publish` command
5) Edit `config/cleantalk.php` configuration file
6) Include JS into your root blade template (into head block) `@include('cleantalk::cleantalk')`
7) Add the middleware to your routes which requires the anti-spam protection (usually form hanled route)

## Details:
1) Open the terminal in the root of your laravel application and run command to require anti-spam module: `composer require cleantalk/laravel-antispam`
2) Edit `config/app.php` file, add new service provider to the `providers` array: `cleantalk\antispam\CleantalkServiceProvider::class`
3) Edit `app/Http/Kernel.php` file, add new middleware to the `$routeMiddleware` array: `'cleantalk_antispam' => \cleantalk\antispam\CleantalkValidate::class`
4) Open the terminal in the root of your laravel application and run command to generate config file and javascript asset: `php artisan vendor:publish`
5) Edit newly added configuration file `config/cleantalk.php`, type your access key and change `enabled` key to `true`
6) Include cleantalk blade template to your root blade template into <head> block: `@include('cleantalk::cleantalk')`
7) So finally add the middleware to the required routes: `->middleware('cleantalk_antispam')`

Now you can test the protection on the route contains `cleantalk_antispam` middleware, just use s@cleantalk.org test email for email field.

## Requirements:

* CleanTalk account https://cleantalk.org/register?product=anti-spam
