<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Form\CategorieType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\File\File;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('newImage', FileType::class, [
                'label' => 'Image : ',
                'required' => false,
                'mapped' => false,
                // 'constraints' => [
                //     new File([
                //         'maxSize' => '1024k',
                        
                //         'mimeTypesMessage' => 'Please upload a valid image',
                //     ])
                // ],
            ])
            ->add('image', null, [
                'required'   => false,])
            ->add('titre')
            ->add('contenu', TextareaType::class)
            ->add('date_parution')
            // ,DateType::class, [
            //     'widget' => 'single_text',
                // 'html5' => false,
                // 'attr' => ['class' => 'js-datepicker'],
                // ])
            ->add('publie')
            // ->add('fkCategorie', CollectionType::class, [
            //     'entry_type' => CategorieType::class,
            //      //'data_class' => Categorie::class,
            //     // 'entry_options' => ['label' => false],
            //     'allow_add' => true,
            //     'prototype' => true,
            //     'prototype_data' => new Categorie()
            // ])
            ->add('fkCategorie' , EntityType::class, [
                // looks for choices from this entity
                'class' => Categorie::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
            
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
