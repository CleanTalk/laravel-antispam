<?php

namespace CleanTalkLaravel;

use CleanTalk\CleantalkAntispam;

class CleantalkValidate
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        self::apbct_spam_test($request->request);
        return $next($request);
    }

	static public function apbct_spam_test($data)
	{
		if (!config('cleantalk.enabled')) {
			return;
		}

		$cleanTalkCheck = new CleanTalkAntispam(config('cleantalk.apikey'));
		$verdict = $cleanTalkCheck->getVerdict();
		if (!$verdict->allow) {
			abort(403, $verdict->comment);

			return false;
		}
	}
}
