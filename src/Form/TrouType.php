<?php

namespace App\Form;

use App\Entity\Trou;
use Doctrine\DBAL\Types\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\TimezoneTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Time;

class TrouType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('HeureD', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
            ->add('TempsD', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class)
            ->add('save',SubmitType::class )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trou::class,
        ]);
    }
}
