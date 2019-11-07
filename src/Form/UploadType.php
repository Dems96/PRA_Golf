<?php

namespace App\Form;

use App\Entity\Upload;
use Doctrine\DBAL\Types\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('heureD', TimeType::array(
                'label' == "Choisissez l'heure de départ"
            )
            ->add('TempsD')
            ->add('name')
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Upload::class,
        ]);
    }
}
