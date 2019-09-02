<?php

namespace App\Form;

use App\Entity\Article;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class)
            ->add('Content', TextType::class)
            ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
            ->setMethod('GET')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
