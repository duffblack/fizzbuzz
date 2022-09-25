<?php
declare(strict_types=1);
/*
 * Description of
 * @FizzBuzzService
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */

namespace App\Business\Service;

use App\Entity\FizzBuzz;

class FizzBuzzService
{
    /**
     * iterate from $initialNumber, for every number if it is divisible by both 3 and 5 add FizzBuzz to the answer
     * @param int $initialNumber lowest number of list to process in fizz buzz game
     * @param int $finalNumber higher number of list to process in fizz buzz game
     * @return string game result
     */
    public function __invoke(int $initialNumber, int $finalNumber): string
    {
        $numbersArray = range($initialNumber, $finalNumber);
        $answer = [];

        foreach ($numbersArray as $key => $eachNumber) {
            $answer[$key] = $eachNumber;
            $isFizzBuzz = FizzBuzz::isFizzBuzz($eachNumber);
            if ($isFizzBuzz['result']) {
                $answer[$key] = $isFizzBuzz['message'];
            }
        }
        return implode(", ", $answer);
    }
}