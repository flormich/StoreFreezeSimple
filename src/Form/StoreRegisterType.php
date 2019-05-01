<?php

namespace App\Form;

use App\Entity\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class StoreRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Nom du produit",
                "required" => true,
                "attr" => [
                    'placeholder' => 'Nom du produit'],
                "constraints" => [
                    new NotBlank,
                    new length([
                        "min" => 2,
                        "max" => 35,
                        "minMessage" => "error.min.name",
                        "maxMessage" => "error.max.name",
                    ]),
                ],
            ])

            ->add('dlc', TextType::class, [
                "label" => "Date Limite de Consomation",
                "required" => false,
                "attr" => [
                    'placeholder' => 'Date Limite de Consommation'],
                    "constraints" => [
                        // new Regex([
                        //     "pattern" => "/[d{2}\/\d{4}\]/u",
                        //     "message" => "error.date",
                        // ]),
                    ],
            ])

            ->add('quantityUnit', IntegerType::class, [
                "label" => "Quantités Unitaires",
                "attr" => [
                    'placeholder' => 'Quantités Unitaires'],
                "constraints" => [
                    new Regex([
                        "pattern" => "/[0-9]/u",
                        "message" => "error.quantityUnit",
                    ]),
                ],
            ])

            ->add('quantityGr', IntegerType::class, [
                "label" => "Quantités en Grammes",
                "attr" => [
                    'placeholder' => 'Quantités en Grammes'],
                "constraints" => [
                    new Regex([
                        "pattern" => "/[0-9]/u",
                        "message" => "error.quantityGr",
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}