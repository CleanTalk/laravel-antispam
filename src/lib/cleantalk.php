<?php
if (!config('cleantalk.enabled')) {
	return;
}
// Set Cookies test for cookie test
$apbct_timestamp = time();
setcookie('apbct_timestamp',     $apbct_timestamp,                0, '/');
setcookie('apbct_cookies_test',  md5(config('cleantalk.apikey').$apbct_timestamp), 0, '/');
