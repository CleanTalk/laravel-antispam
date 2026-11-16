<?php

use CleanTalkLaravel\BotDetectorService;
use PHPUnit\Framework\TestCase;

class BotDetectorServiceTest extends TestCase
{
    public function testWrapperUrlIsTakenFromCommonLibraryDefaults()
    {
        $this->assertSame(
            'https://fd.cleantalk.org/ct-bot-detector-wrapper.js',
            BotDetectorService::getInstance()->getWrapperURL()
        );
    }

    public function testCommonLibraryIsLoadedFromBundledLib()
    {
        $reflection = new ReflectionClass('Cleantalk\Common\BotDetectorService\BotDetectorService');

        $this->assertSame(
            realpath(__DIR__ . '/../lib/Cleantalk/Common/BotDetectorService/BotDetectorService.php'),
            realpath($reflection->getFileName())
        );
    }
}
