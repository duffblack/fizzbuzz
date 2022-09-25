<?php
declare(strict_types=1);
/*
 * Description of
 * @abstract
 * @author Francisco Javier Pérez Murciego
 * @date
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */

namespace App\Tests;

use App\Entity\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    protected FizzBuzz $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz;
    }

    /**
     * @dataProvider provider
     */
    public function testFizzBuzz($initialNumber, $finalNumber, $content)
    {
        $this->fizzBuzz->setInitialNumber($initialNumber);
        $this->fizzBuzz->setFinalNumber($finalNumber);
        $this->fizzBuzz->fizzBuzz();
        $this->assertEquals($content, $this->fizzBuzz->getFizzBuzz());

    }

    /**
     * Data provider for testFizzBuzz
     */
    public function provider(): array
    {

        return array(
            array(30,67,
                "FizzBuzz, 31, 32, Fizz, 34, Buzz, Fizz, 37, 38, Fizz, Buzz, 41, Fizz, 43, 44, FizzBuzz, 46, 47, Fizz, 49, Buzz, Fizz, 52, 53, Fizz, Buzz, 56, Fizz, 58, 59, FizzBuzz, 61, 62, Fizz, 64, Buzz, Fizz, 67")
        );
    }
}