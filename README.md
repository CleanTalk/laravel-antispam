# Laravel Spam Protection Without CAPTCHA/reCAPTCHA by CleanTalk

Laravel library for cleantalk.org anti-spam service. Invisible spam protection without CAPTCHA, reCAPTCHA, puzzles, math or any annoying tasks.

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

## Requirements
* CleanTalk account https://cleantalk.org/register?product=anti-spam


## How to use
1) Require the `cleantalk/laravel-antispam` module
2) Register the `CleantalkServiceProvider` service provider into your app.php
3) Register the `cleantalk_antispam` middleware into your  Kernel.php
4) Load the  publishes by  `php artisan vendor:publish` command
5) Edit `config/cleantalk.php` configuration file
6) Include JS into your root blade template (into head block) `@include('cleantalk::cleantalk')`
7) Add the middleware to your routes which requires the anti-spam protection (usually form hanled route)

## Details
1) Open the terminal in the root of your laravel application and run command to require anti-spam module: `composer require cleantalk/laravel-antispam`
2) Edit `config/app.php` file, add new service provider to the `providers` array: `cleantalk\antispam\CleantalkServiceProvider::class` ![Adding service provider](https://raw.githubusercontent.com/CleanTalk/laravel-antispam/master/documentation/screenshots/1.png)
3) Edit `app/Http/Kernel.php` file, add new middleware to the `$routeMiddleware` array: `'cleantalk_antispam' => \cleantalk\antispam\CleantalkValidate::class` ![Adding middleware](https://raw.githubusercontent.com/CleanTalk/laravel-antispam/master/documentation/screenshots/2.png)
4) Open the terminal in the root of your laravel application and run command to generate config file and javascript asset: `php artisan vendor:publish`
5) Edit newly added configuration file `config/cleantalk.php`, type your access key and change `enabled` key to `true` ![Changing configuration](https://raw.githubusercontent.com/CleanTalk/laravel-antispam/master/documentation/screenshots/3.png)
6) Include cleantalk blade template to your root blade template into <head> block: `@include('cleantalk::cleantalk')` ![Adding blade template](https://raw.githubusercontent.com/CleanTalk/laravel-antispam/master/documentation/screenshots/4.png)
7) So finally add the middleware to the required routes: `->middleware('cleantalk_antispam')` ![Using middleware](https://raw.githubusercontent.com/CleanTalk/laravel-antispam/master/documentation/screenshots/5.png)

Now you can test the protection on the route contains `cleantalk_antispam` middleware, just use s@cleantalk.org test email for email field.

If no requests are intercepted after configuration, add `\cleantalk\antispam\CleantalkValidate::class` to the `$middleware` variable.
