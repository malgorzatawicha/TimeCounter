<?php
namespace TimeCounter\TimeUnit;

interface Comparable
{
    public function precedes(Comparable $comparable): bool;
    public function meets(Comparable $comparable): bool;
    public function overlaps(Comparable $comparable): bool;
    public function finishedBy(Comparable $comparable): bool;
    public function contains(Comparable $comparable): bool;
    public function starts(Comparable $comparable): bool;
    public function equals(Comparable $comparable): bool;
    public function startedBy(Comparable $comparable): bool;
    public function during(Comparable $comparable): bool;
    public function finishes(Comparable $comparable): bool;
    public function overlappedBy(Comparable $comparable): bool;
    public function metBy(Comparable $comparable): bool;
    public function precededBy(Comparable $comparable): bool;
}