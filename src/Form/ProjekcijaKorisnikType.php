<?php

namespace App\Form;

use App\Entity\ProjekcijaKorisnik;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjekcijaKorisnikType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projekcijeIdProjekcija')
            ->add('korisnikIdKorisnik')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProjekcijaKorisnik::class,
        ]);
    }
}
