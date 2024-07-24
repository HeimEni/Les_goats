<?php

namespace App\Form;

use App\Entity\Croc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrocType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hauteur')
            ->add('largeur')
            ->add('aiguiser')
            ->add('lime')
            ->add('poli')
            ->add('NomProprietaire');

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Croc::class,
        ]);
    }
}
