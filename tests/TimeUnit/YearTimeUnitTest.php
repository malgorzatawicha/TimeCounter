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
            '2015 precedes 2017' => ['2015', '2017', true],
            '2016 precedes 2017' => ['2016', '2017', true],
            '2017 does not precede 2017' => ['2017', '2017', false],
            '2018 does not precede 2017' => ['2018', '2017', false],
            '2019 does not precede 2017' => ['2019', '2017', false],
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
            '2015 is not preceded by 2017' => ['2015', '2017', false],
            '2016 is not preceded by 2017' => ['2016', '2017', false],
            '2017 is not preceded by 2017' => ['2017', '2017', false],
            '2018 is preceded by 2017' => ['2018', '2017', true],
            '2019 is preceded by 2017' => ['2019', '2017', true],
        ];
    }

    /**
     * @dataProvider yearsMeetsOtherYears
     * @param string $firstYearValue
     * @param string $secondYearValue
     * @param bool $expectedResult
     */
    public function testCheckingOneYearMeetsSecondReturnsCorrectResults(
        string $firstYearValue,
        string $secondYearValue,
        bool $expectedResult
    ) {
        $firstYear = new YearTimeUnit($firstYearValue);
        $secondYear = new YearTimeUnit($secondYearValue);

        $this->assertEquals($expectedResult, $firstYear->meets($secondYear));
    }

    public function yearsMeetsOtherYears()
    {
        return [
            '2015 does not meet 2017' => ['2015', '2017', false],
            '2016 meets 2017' => ['2016', '2017', true],
            '2017 does not meet 2017' => ['2017', '2017', false],
            '2018 does not meet 2017' => ['2018', '2017', false],
            '2019 does not meet 2017' => ['2019', '2017', false],
        ];
    }

    /**
     * @dataProvider yearsMetByOtherYears
     * @param string $firstYearValue
     * @param string $secondYearValue
     * @param bool $expectedResult
     */
    public function testCheckingOneYearIsMetBySecondReturnsCorrectResults(
        string $firstYearValue,
        string $secondYearValue,
        bool $expectedResult
    ) {
        $firstYear = new YearTimeUnit($firstYearValue);
        $secondYear = new YearTimeUnit($secondYearValue);

        $this->assertEquals($expectedResult, $firstYear->metBy($secondYear));
    }

    public function yearsMetByOtherYears()
    {
        return [
            '2015 is not met 2017' => ['2015', '2017', false],
            '2016 is not met 2017' => ['2016', '2017', false],
            '2017 is not met 2017' => ['2017', '2017', false],
            '2018 is met 2017' => ['2018', '2017', true],
            '2019 is not met 2017' => ['2019', '2017', false],
        ];
    }

    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearOverlapsSecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->overlaps($secondYear);
    }

    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearIsOverlappedBySecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->overlappedBy($secondYear);
    }

    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearFinishesSecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->finishes($secondYear);
    }

    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearIsFinishedBySecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->finishedBy($secondYear);
    }
    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearStartsSecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->starts($secondYear);
    }

    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearIsStartedBySecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->startedBy($secondYear);
    }
    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearDuringSecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->during($secondYear);
    }

    /**
     * @expectedException \TimeCounter\TimeUnit\NotComparableException
     */
    public function testCheckingOneYearContainsSecondThrowsNotComparableException()
    {
        $firstYear = new YearTimeUnit('2015');
        $secondYear = new YearTimeUnit('2016');

        $firstYear->contains($secondYear);
    }

}
