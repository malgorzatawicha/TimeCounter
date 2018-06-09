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

    /**
     * @dataProvider yearsPrecedesOtherYears
     * @param string $firstYearValue
     * @param string $secondYearValue
     * @param bool $expectedResult
     */
    public function testCheckingOneYearPrecedesSecondReturnsCorrectResults(
        string $firstYearValue,
        string $secondYearValue,
        bool $expectedResult
    ) {
        $firstYear = new YearTimeUnit($firstYearValue);
        $secondYear = new YearTimeUnit($secondYearValue);

        $this->assertEquals($expectedResult, $firstYear->precedes($secondYear));
    }

    public function yearsPrecedesOtherYears()
    {
        return [
            '2015 precedes 2018' => ['2015', '2018', true],
            '2016 precedes 2017' => ['2016', '2017', true],
            '2017 does not precede 2017' => ['2017', '2017', false],
            '2018 does not precede 2017' => ['2018', '2017', false],
        ];
    }

    /**
     * @dataProvider yearsPrecededByOtherYears
     * @param string $firstYearValue
     * @param string $secondYearValue
     * @param bool $expectedResult
     */
    public function testCheckingOneYearIsPrecededBySecondReturnsCorrectResults(
        string $firstYearValue,
        string $secondYearValue,
        bool $expectedResult
    ) {
        $firstYear = new YearTimeUnit($firstYearValue);
        $secondYear = new YearTimeUnit($secondYearValue);

        $this->assertEquals($expectedResult, $firstYear->precededBy($secondYear));
    }

    public function yearsPrecededByOtherYears()
    {
        return [
            '2018 is preceded by 2015' => ['2018', '2015', true],
            '2017 is preceded by 2016' => ['2017', '2016', true],
            '2017 is not preceded by 2017' => ['2017', '2017', false],
            '2017 is not preceded by 2018' => ['2017', '2018', false],
        ];
    }
}
