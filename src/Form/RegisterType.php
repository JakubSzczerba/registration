<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Provider\RegionProvider;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    private $regionProvider;

    public function __construct(RegionProvider $regionProvider)
    {
        $this->regionProvider = $regionProvider;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, [
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
                'required' => false,
            ])
            ->add('address', TextType::class, [
                'label' => 'Ulica, nr domu: ',
            ])
            ->add('city', TextType::class, [
                'label' => 'Miejscowość, kod pocztowy: ',
            ])
            ->add('region', ChoiceType::class, [
                'choices' => $this->regionProvider->deserializeRegion(),
                'label' => 'Województwo: ',
                'choice_value' => function ($value) {
                 return $value;
                },
                'choice_label' => function ($value) {
                    return $value;
                }
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
                'required' => false,
            ])
            ->add('companyName', TextType::class, [
                'label' => 'Firma: ',
                'row_attr' => ['id' => 'companyName', 'style' => 'display: none'],
                'required' => false,
            ])
            ->add('nip', TextType::class, [
                'label' => 'Nip: ',
                'row_attr' => ['id' => 'nip', 'style' => 'display: none'],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }

}