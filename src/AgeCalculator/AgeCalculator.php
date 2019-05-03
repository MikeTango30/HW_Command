<?php


namespace App\AgeCalculator;

class AgeCalculator
{
    /**
     * @param string $birthday
     * @return int
     */
    public function calculateAge(string $birthday): int
    {
         $age = intval(date('Y', time() - strtotime($birthday))) - 1970;

        return $age;
    }
}

