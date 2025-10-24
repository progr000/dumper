<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

class DumperTest extends TestCase
{
    /**
     * @return void
     */
    public function testDumpIntoStrForConsole()
    {
        $ret = dumpIntoStr(['aaa', 'bbb', 'ccc']);
        $this->assertContains('aaa', $ret);
        $this->assertContains('bbb', $ret);
        $this->assertContains('ccc', $ret);
        $this->assertContains('array(3)', $ret);
        $this->assertNotContains('.js-dump-collapse', $ret);
    }

    /**
     * @return void
     */
    public function testDumpIntoStrForWeb()
    {
        define('IS_TEST_FOR_DUMPER', true);
        $ret = dumpIntoStr(['aaa', 'bbb', 'ccc']);
        $this->assertContains('aaa', $ret);
        $this->assertContains('bbb', $ret);
        $this->assertContains('ccc', $ret);
        $this->assertContains('array(3)', $ret);
        $this->assertContains('.js-dump-collapse', $ret);
    }

}