<?php
declare(strict_types=1);
/*
 * Description of
 * @FizzBuzzExtension
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FizzBuzzExtension extends AbstractExtension
{

    public function getFunctions(): array
    {
        return [
            new TwigFunction('fizzBuzz', [$this, 'fizzBuzz']),
        ];
    }

    /**
     * iterate from $initialNumber, for every number if it is divisible by both 3 and 5 add FizzBuzz to the answer
     * @param int $initialNumber first number of list to process in fizz buzz game
     * @return string game result
     */
    public function fizzBuzz(int $initialNumber): string
    {
        $numberArrayLength = 30;
        $numberArray = $this->generateNumberList($initialNumber, $numberArrayLength);
        $answer = [];

        foreach ($numberArray as $key => $eachNumber) {
            $answer[$key] = $eachNumber;
            $isFizzBuzz = $this->isFizzBuzz($eachNumber);
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
    /**
     * @param int $initialNumber lowest number of the array
     * @param int $length  array length
     * @return array of (int) numbers
     */
    protected function generateNumberList(int $initialNumber, int $length): array
    {
        $lastNumber = $initialNumber + $length - 1;
        return range($initialNumber, $lastNumber);
    }
}