<?php

namespace App\Form;

use App\Entity\Osoba;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OsobaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ime')
            ->add('prezime')
            ->add('produkcijskaUlogaIdProdukcijskauloga')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Osoba::class,
        ]);
    }
}
