<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'label'=>' ',
                'attr'=>[
                'placeholder'=>'Veuillez entrer votre email'
                ]
            ])

            ->add('nom',TextType::class,[
                'label'=>' ',
                'attr'=>[
                'placeholder'=>'Veuillez entrer votre Nom'
                ]
            ])

            ->add('prenom',TextType::class,[
                'label'=>' ',
                'attr'=>[
                'placeholder'=>'Veuillez entrer votre prénom'
                ]
            ])

            ->add('sujet',TextType::class,[
                'label'=>' ',
                'attr'=>[
                'placeholder'=>"Sujet de votre message"
                ]
            ])

            ->add('message',TextareaType::class,[
                'label'=>' ',
                'constraints'=>new Length([
                    'min'=>'2',
                    'max'=>'2000'
                ]),
                'attr'=>[
                'placeholder'=>'Veuillez entrer votre message'
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' =>Contact::class,
        ]);
    }
}