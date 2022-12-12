<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

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
                'choice_attr' => [
                    'klient indywidualny' => ['onchange' => 'showCustomer()'],
                    'Firma' => ['onchange' => 'showCompany()'],
                ],
                'label' => 'Status prawny: ',
                'data' => 'customer',
                'expanded' => true,
                'attr' => ['style' => 'display: inline-block'],
                'row_attr' => ['id' => 'legalStatus'],
            ])
            ->add('fullName', TextType::class, [
                'label' => 'Imię i nazwisko: ',
                'row_attr' => ['id' => 'fullName'],
            ])
            ->add('address', TextType::class, [
                'label' => 'Ulica, nr domu: ',
            ])
            ->add('city', TextType::class, [
                'label' => 'Miejscowość, kod pocztowy: ',
            ])
            ->add('region', ChoiceType::class, [
                'choices' => [
                    'Pomorskie' => '1',
                    'Mazowieckie' => '2',
                ],
                'label' => 'Województwo: '
            ])
            ->add('mobile', TelType::class, [
                'label' => 'Telefon: ',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email: ',
            ])
            ->add('pesel', NumberType::class, [
                'label' => 'Pesel: ',
                'row_attr' => ['id' => 'pesel'],
            ])
            ->add('companyName', TextType::class, [
                'label' => 'Firma: ',
                'row_attr' => ['id' => 'companyName', 'style' => 'display: none'],
            ])
            ->add('nip', TextType::class, [
                'label' => 'Nip: ',
                'row_attr' => ['id' => 'nip', 'style' => 'display: none'],
            ])
        ;
    }

}