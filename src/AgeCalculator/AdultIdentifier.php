<?php


namespace App\AgeCalculator;

class AdultIdentifier
{
    public function amIAdult(int $age): bool
    {
        return $age >= 18 ? True : False;
    }
}