<?php

namespace App\Form;

use App\Entity\Projekcija;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjekcijaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vrijeme')
            ->add('brojKarata')
            ->add('filmoviIdFilm')
            ->add('dvoraneIdDvorana')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projekcija::class,
        ]);
    }
}
