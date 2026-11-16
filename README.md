## Laravel Spam Protection for Forms — reCAPTCHA Alternative

CleanTalk is a powerful Laravel anti-spam solution for contact, registration, and comment forms. It offers invisible spam protection — no CAPTCHA, no reCAPTCHA, no user friction.

Unlike traditional CAPTCHA tools, CleanTalk silently filters spam in the background using behavioral analysis and real-time checks. It’s a drop-in replacement for CAPTCHA, built for Laravel developers who care about UX and clean code.

If you find this project useful, please consider starring ⭐ it on GitHub — it helps us grow and support development!

## How does CleanTalk stop spam?
CleanTalk anti-spam service provides automatic and invisible protection for websites by analyzing visitor behavior and evaluating form submissions.

When a visitor submits a form on your site, CleanTalk sends the data to the cloud for analysis on CleanTalk cloud servers. These servers analyze the submitted data using several spam checks and content analysis methods, providing a quick decision on whether to allow the submission or mark it as spam. This process includes analyzing a wide range of parameters.

Based on these comprehensive checks, CleanTalk creates and continuously updates blacklists containing email addresses, IP addresses and website domains commonly used by spambots.

CleanTalk has developed advanced algorithms to accurately distinguish between real visitors and spambots, effectively blocking almost 100% of spam attempts.

Additional anti-spam features:

* Detailed spam logs: Monitor and analyze all incoming submissions and their spam status.
* Personal blacklists and whitelists: Manually allow or block specific IP addresses, email addresses, or domains.
* Country filtering: Block form submissions from selected countries.
* Stop word filtering: Automatically block messages containing specific words or phrases.
* Language filtering: Automatically block or allow comments and submissions based on their language, helping to reduce irrelevant or unwanted content.
* Disposable/temporary email blocking: Prevent registrations and form submissions from disposable email addresses commonly used by spammers.
* Real-time Email Verification: Automatically verify email addresses in real time, ensuring that submissions and signups are made from legitimate and existing email accounts.

### Websites that trust CleanTalk!

![CleanTalk Anti-Spam Rating](https://cleantalk.org/webpack/img/cleantalk_rating.png)

## Requirements
* PHP 5.6 or higher (tested up to PHP 8.5)
* Laravel 5.0 – 13 (Laravel 5.0 – 5.4 is the only branch that runs on PHP 5.6)
* CleanTalk account https://cleantalk.org/register?product=anti-spam


## How to use
1) Require the `cleantalk/laravel-antispam` module
2) Register the `CleantalkServiceProvider` service provider
3) Register the `cleantalk_antispam` middleware
4) Publish the configuration file by `php artisan vendor:publish` command
5) Edit `config/cleantalk.php` configuration file
6) Include the bot-detector script into your root blade template (into head block) `@include('cleantalk::cleantalk')`
7) Add the middleware to your routes which requires the anti-spam protection (usually form handled route)

## Details
1) Open the terminal in the root of your laravel application and run command to require anti-spam module: 
```bash
composer require cleantalk/laravel-antispam
```

2) For Laravel 5.0 – 10 edit `config/app.php` file, add new service provider to the `providers` array: 
```php
\CleanTalkLaravel\CleantalkServiceProvider::class
```
For Laravel 11 and newer edit file `bootstrap/providers.php`, add to returned array 
```php
\CleanTalkLaravel\CleantalkServiceProvider::class
```
3) For Laravel 5.0 – 10 edit `app/Http/Kernel.php` file, add new middleware to the `$routeMiddleware` array (`$middlewareAliases` in Laravel 10):
```php
'cleantalk_antispam' => \CleanTalkLaravel\CleantalkValidate::class
```
For Laravel 11 and newer edit file `bootstrap/app.php`, add to `->withMiddleware` method 
```php
$middleware->alias([
    'cleantalk_antispam' => \CleanTalkLaravel\CleantalkValidate::class
]);
```
4) Open the terminal in the root of your laravel application and run command to generate config file:
```php
php artisan vendor:publish --provider="CleanTalkLaravel\CleantalkServiceProvider"
```
5) Edit newly added configuration file `config/cleantalk.php`:
   * `apikey` - type your access key;
   * `enabled` - change to `true`;
   * `event_token_enabled` - set `true` manually if the bot-detector script is included (step 6). The flag is sent to the CleanTalk cloud as `event_token_enabled=1` to apply bot-detector filters on the cloud side. It does not enable or disable the bot-detector script itself. Default is `false`.
6) Include cleantalk blade template to your root blade template into `<head>` block:
```php
@include('cleantalk::cleantalk')
```
It loads the CleanTalk bot-detector script, which adds the `ct_bot_detector_event_token` hidden field to the forms on the page. The token is sent to the CleanTalk cloud with the form data and is used to distinguish real visitors from bots.

7) So finally add the middleware to the required routes:
```php
->middleware('cleantalk_antispam')
```

Now you can test the protection on the route contains `cleantalk_antispam` middleware, just use s@cleantalk.org test email for email field.
