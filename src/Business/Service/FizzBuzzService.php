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
      return $this->fizzBuzz($initialNumber, $finalNumber);
    }

    /**
     * iterate from $initialNumber, for every number if it is divisible by both 3 and 5. Finally, set fizzbuzz attribute
     * @return string fizzbuzz algorithm result
     */
    protected function fizzBuzz(int $initialNumber,int $finalNumber): string
    {
        $numbersArray = range($initialNumber, $finalNumber);
        $answer = [];

        foreach ($numbersArray as $key => $eachNumber) {
            $answer[$key] = $eachNumber;
            $isFizzBuzz = self::isFizzBuzz($eachNumber);
            if ($isFizzBuzz['result']) {
                $answer[$key] = $isFizzBuzz['message'];
            }
        }
        return implode(", ", $answer);
    }

    /**
     * check if it is divisible by both 3 and 5 and add FizzBuzz to the result
     * @param int $number number to check
     * @return array $result['result'] bool indicates if number meets FizzBuzz condition, $result['message'] string
     */
    protected function isFizzBuzz(int $number): array
    {
        $result = [
            'result' => false,
            'message' => ''
        ];
        $fizzBuzzDictionary = [
            'Fizz' => 3,
            'Buzz' => 5
        ];
        foreach ($fizzBuzzDictionary as $key => $eachValue) {
            if ($number % $eachValue === 0) {
                $result['result'] = true;
                $result['message'] .= $key;
            }
        }
        return $result;
    }
}