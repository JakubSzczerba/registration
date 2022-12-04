<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('legalStatus', ChoiceType::class, [
                'choices' => [
                    'klient indywidualny' => 'customer',
                    'Firma' => 'company'
                ],
                'label' => 'Status prawny: ',
                'expanded' => 'true',
                'multiple' => 'true',
            ]);
    }

}