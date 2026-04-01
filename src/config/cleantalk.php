<?php

return [
	'enabled' => false,
	'apikey' => '',
	/*
	 * When true, requests include event_token_enabled=1 so the cloud applies bot-detector-aware rules.
	 * Set false if you do not use @include('cleantalk::cleantalk') / the bot-detector script.
	 */
	'event_token_enabled' => false,
];