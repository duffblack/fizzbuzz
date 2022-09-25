<?php
declare(strict_types=1);
/*
 * Description of
 * @FizzBuzzChallengeOne
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FizzBuzzChallengeOne extends AbstractController
{
    #[Route('/desafio1/fizz/buzz', name: 'fizz_buzz_challenge_one', methods: ['GET'])]
    public function fizzBuzz(): Response
    {
        return $this->render('challenge1.html.twig',
            [
            ]);
    }
}