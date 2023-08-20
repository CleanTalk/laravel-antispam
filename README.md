# laravel-antispam

## How to use:
1)  Require the `cleantalk/laravel-antispam` module
2)  Register the `CleantalkServiceProvider` service provider into your app.php
3)  Register the `cleantalk_antispam` middleware into your  Kernel.php
4)  Load the  publishes by  `php artisan vendor:publish` comand
5)  Edit `config/cleantalk.php` configuration file
6)  Add the middleware to your routes which requires the anti-spam protection (usually form hanled route)

## Details:


## Requirements

* CleanTalk account https://cleantalk.org/register?product=anti-spam
