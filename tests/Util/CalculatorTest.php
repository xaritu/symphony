<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/08/29
 * Time: 16:54
 */

namespace App\Tests\Util;

use App\Util\Calculator1;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator1();
        $result = $calculator->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
}