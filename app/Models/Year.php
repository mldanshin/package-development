<?php

namespace Danshin\Development\Models;

final class Year
{
    private int $today;

    public function __construct()
    {
        $this->today = (int)date("Y");
    }

    public function periodFrom(int $fromYear): string
    {
        $this->validateToday($fromYear);
        $this->validateOrder($fromYear, $this->today);
        $this->validateRelevance($fromYear);

        if ($fromYear === $this->today) {
            return (string)$this->today;
        } else {
            return "$fromYear-{$this->today}";
        }
    }

    public function periodFromTo(int $fromYear, int $toYear): string
    {
        $this->validateToday($fromYear);
        $this->validateToday($toYear);
        $this->validateOrder($fromYear, $toYear);
        $this->validateRelevance($fromYear);
        $this->validateRelevance($toYear);

        return "$fromYear-$toYear";
    }

    public function today(): string
    {
        return (string)$this->today;
    }

    private function validateToday(int $year): void
    {
        if ($year > $this->today) {
            throw new \Exception("The date can't be more than today's date.");
        }
    }

    private function validateOrder(int $start, int $end): void
    {
        if ($start > $end) {
            throw new \Exception("The start date is greater than the end date.");
        }
    }

    private function validateRelevance(int $year): void
    {
        if ($year < 1970) {
            throw new \Exception("The date cannot be earlier than 1970.");
        }
    }
}
