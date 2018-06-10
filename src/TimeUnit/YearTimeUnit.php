<?php
namespace TimeCounter\TimeUnit;

class YearTimeUnit implements Comparable
{

    /**
     * @var string
     */
    private $year;

    public function __construct(string $year)
    {
        $this->year = $year;
    }

    protected function getYear()
    {
        return $this->year;
    }

    public function precedes(Comparable $comparable): bool
    {
        if ($comparable instanceof YearTimeUnit) {
            return $this->getYear() < $comparable->getYear();
        }
        return false;
    }

    public function meets(Comparable $comparable): bool
    {
        if ($comparable instanceof YearTimeUnit) {
            return $this->getYear() == ($comparable->getYear() - 1);
        }
        return false;
    }

    public function overlaps(Comparable $comparable): bool
    {
        return false;
    }

    public function finishedBy(Comparable $comparable): bool
    {
        return false;
    }

    public function contains(Comparable $comparable): bool
    {
        return false;
    }

    public function starts(Comparable $comparable): bool
    {
        return false;
    }

    public function equals(Comparable $comparable): bool
    {
        return false;
    }

    public function startedBy(Comparable $comparable): bool
    {
        return false;
    }

    public function during(Comparable $comparable): bool
    {
        return false;
    }

    public function finishes(Comparable $comparable): bool
    {
        return false;
    }

    public function overlappedBy(Comparable $comparable): bool
    {
        return false;
    }

    public function metBy(Comparable $comparable): bool
    {
        if ($comparable instanceof YearTimeUnit) {
            return $this->getYear() == ($comparable->getYear() + 1);
        }
        return false;
    }

    public function precededBy(Comparable $comparable): bool
    {
        if ($comparable instanceof YearTimeUnit) {
            return $comparable->getYear() < $this->getYear();
        }
        return false;
    }
}
