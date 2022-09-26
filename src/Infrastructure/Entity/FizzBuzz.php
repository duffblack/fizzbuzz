<?php
/*
 * Description of
 * @FizzBuzz
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */

namespace App\Infrastructure\Entity;

use App\Infrastructure\Repository\FizzBuzzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FizzBuzzRepository::class)]
class FizzBuzz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $initialNumber;

    #[ORM\Column]
    private int $finalNumber;

    #[ORM\Column(length: 50)]
    private string $creation_date;

    #[ORM\Column(length: 255)]
    private string $fizzBuzz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitialNumber(): int
    {
        return $this->initialNumber;
    }

    public function setInitialNumber(int $initialNumber): self
    {
        $this->initialNumber = $initialNumber;

        return $this;
    }

    public function getFinalNumber(): int
    {
        return $this->finalNumber;
    }

    public function setFinalNumber(int $finalNumber): self
    {
        $this->finalNumber = $finalNumber;

        return $this;
    }

    public function getCreationDate(): string
    {
        return $this->creation_date;
    }

    public function setCreationDate(string $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getFizzBuzz(): string
    {
        return $this->fizzBuzz;
    }

    public function setFizzBuzz(string $fizzBuzz): self
    {
        $this->fizzBuzz = $fizzBuzz;

        return $this;
    }
}
