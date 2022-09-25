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

use App\Entity\FizzBuzz;
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
            $isFizzBuzz = FizzBuzz::isFizzBuzz($eachNumber);
            if ($isFizzBuzz['result']) {
                $answer[$key] = $isFizzBuzz['message'];
            }
        }
        return implode(", ", $answer);
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