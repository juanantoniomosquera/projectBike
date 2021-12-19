<?php

use PHPUnit\Framework\TestCase;
use App\Services\Util\UtilRegExp;

class UtilRegExpTest extends TestCase
{
    private $utilRegExp;

    public function setUp(): void
    {
        $this->utilRegExp = new UtilRegExp();
    }

    public function testGetIdsNum(): void
    {
        $this->assertIsArray(
            $this->utilRegExp->getIdsNum('Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)')
        );
    }

    public function testReplaceIdsFor(): void
    {
        $this->assertIsString(
            $this->utilRegExp->replaceIdfor('Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)', '@NameUser')
        );
    }
}