<?php

namespace App\Entity;

use App\Repository\FizzBuzzRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;

#[ORM\Entity(repositoryClass: FizzBuzzRepository::class)]
class FizzBuzz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $initialNumber = null;

    #[ORM\Column]
    private ?int $finalNumber = null;

    #[ORM\Column(length: 50)]
    private ?string $creation_date = null;

    #[ORM\Column(length: 255)]
    private ?string $fizzBuzz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitialNumber(): ?int
    {
        return $this->initialNumber;
    }

    public function setInitialNumber(int $initialNumber): self
    {
        $this->initialNumber = $initialNumber;

        return $this;
    }

    public function getFinalNumber(): ?int
    {
        return $this->finalNumber;
    }

    public function setFinalNumber(int $finalNumber): self
    {
        $this->finalNumber = $finalNumber;

        return $this;
    }

    public function getCreationDate(): ?string
    {
        return $this->creation_date;
    }

    public function setCreationDate(string $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getFizzBuzz(): ?string
    {
        return $this->fizzBuzz;
    }

    public function setFizzBuzz(string $fizzBuzz): self
    {
        $this->fizzBuzz = $fizzBuzz;

        return $this;
    }

    /**
     * check if it is divisible by both 3 and 5 and add FizzBuzz to the result
     * @param int $number number to check
     * @return array $result['result'] bool indicates if number meets FizzBuzz condition, $result['message'] string
     */
    public static function isFizzBuzz(int $number): array
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
     * iterate from $initialNumber, for every number if it is divisible by both 3 and 5. Finally, set fizzbuzz attribute
     */
    public function fizzBuzz(): void
    {
        $numbersArray = range($this->initialNumber, $this->finalNumber);
        $answer = [];

        foreach ($numbersArray as $key => $eachNumber) {
            $answer[$key] = $eachNumber;
            $isFizzBuzz = self::isFizzBuzz($eachNumber);
            if ($isFizzBuzz['result']) {
                $answer[$key] = $isFizzBuzz['message'];
            }
        }
        $this->fizzBuzz = implode(", ", $answer);
    }

    /**
     * persist FizzBuzz entity
     * @param ManagerRegistry $doctrine
     * @return void
     */
    public function save(ManagerRegistry $doctrine): void
    {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($this);
        $entityManager->flush();
    }
}
