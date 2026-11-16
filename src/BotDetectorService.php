<?php

namespace CleanTalkLaravel;

use Cleantalk\Common\BotDetectorService\BotDetectorService as CommonBotDetectorService;

/**
 * Laravel implementation of the CleanTalk bot-detector service.
 * The wrapper URL is not stored, so getWrapperURL() returns the default
 * https://fd.cleantalk.org/ct-bot-detector-wrapper.js
 */
class BotDetectorService extends CommonBotDetectorService
{
    /**
     * @param string $wrapper_url
     * @return void
     */
    public function saveWrapperURL($wrapper_url)
    {
    }

    /**
     * @return false
     */
    public function loadWrapperURL()
    {
        return false;
    }
}
