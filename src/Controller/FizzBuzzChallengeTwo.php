<?php
declare(strict_types=1);
/*
 * Description of
 * @FizzBuzzChallengeTwo
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */

namespace App\Controller;

use App\Business\Service\FizzBuzzService;
use App\Form\Type\FizzBuzzType;
use App\Infrastructure\Entity\FizzBuzz;
use App\Infrastructure\Repository\FizzBuzzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Service\Attribute\Required;

class FizzBuzzChallengeTwo extends AbstractController
{
    #[Required]
    public FizzBuzzRepository $fizzBuzzRepository;

    public function __construct(private readonly FizzBuzzService $fizzBuzzService)
    {

    }

    #[Route('/desafio2/fizz/buzz', name: 'fizz_buzz_challenge_two', methods: ['GET', 'POST'])]
    public function fizzBuzz(Request $request): Response
    {
        $result = '';
        $fizzBuzz = new FizzBuzz();
        $date = new \DateTime();
        $fizzBuzz->setCreationDate($date->format('Y-m-d H:i:s'));

        $form = $this->createForm(FizzBuzzType::class, $fizzBuzz);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var FizzBuzz $fizzBuzz */
            $fizzBuzz = $form->getData();
            $result = $this->fizzBuzzService->__invoke($fizzBuzz->getInitialNumber(), $fizzBuzz->getFinalNumber());
            $fizzBuzz->setFizzBuzz($result);
            $this->fizzBuzzRepository->save($fizzBuzz, true);
        }

        return $this->renderForm('challenge2.html.twig', [
            'form' => $form,
            'result' => $result
        ]);
    }
}