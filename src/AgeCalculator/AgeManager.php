<?php


namespace App\AgeCalculator;

class AgeManager
{
    private $ageCalculator;
    private $adultIdentifier;

    /**
     * AgeManager constructor.
     * @param $ageCalculator
     * @param $adultIdentifier
     */
    public function __construct(AgeCalculator $ageCalculator, AdultIdentifier $adultIdentifier)
    {
        $this->ageCalculator = $ageCalculator;
        $this->adultIdentifier = $adultIdentifier;
    }


    public function getAge(string $birthday): int
    {
        $age = $this->ageCalculator->calculateAge($birthday);

        return $age;
    }

    public function identifyIfAdult(int $age): bool
    {
        return $this->adultIdentifier->amIAdult($age);
    }
}