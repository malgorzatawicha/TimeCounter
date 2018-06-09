<?php
namespace TimeCounter\Tests\TimeUnit;

use PHPUnit\Framework\TestCase;
use TimeCounter\TimeUnit\Comparable;
use TimeCounter\TimeUnit\YearTimeUnit;

class YearTimeUnitTest extends TestCase
{
    public function testYearTimeUnitIsComparable()
    {
        $year = new YearTimeUnit('2017');
        $this->assertInstanceOf(Comparable::class, $year);
    }
}