<?php
namespace App\Form;



use App\Entity\Cube;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SecondFormType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add("arete");
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(["data_class" => Cube::class]);
    }
}