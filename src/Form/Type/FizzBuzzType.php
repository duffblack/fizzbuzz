<?php
declare(strict_types=1);
/*
 * Description of
 * @FizzBuzzType
 * @author Francisco Javier Pérez Murciego
 * @25-09-2022
 * @copyright (c)  Francisco Javier Pérez Murciego <javionica@gmail.com>
 */

namespace App\Form\Type;

use App\Entity\FizzBuzz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FizzBuzzType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('initialNumber',IntegerType::class)
            ->add('finalNumber',IntegerType::class)
            ->add('save', SubmitType::class, ['label' => 'Create FizzBuzz']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FizzBuzz::class,
        ]);
    }
}