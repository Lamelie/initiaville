<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Titre du projet '
            ])
            ->add('pictureFile', FileType::class, [
                'mapped'=> false,
                'label'=>'Illustration',

            ])
            ->add('cost', MoneyType::class, [
                'label'=>'Budget'
            ])
            ->add('excerpt', TextType::class, [
                'label'=>'Résumé'
            ])
            ->add('description')
            ->add('city', EntityType::class, [
                'label'=>'Ville : ',
                'class'=>City::class,
                'multiple'=>false,
                'expanded'=>true
            ])
            ->add('categories', EntityType::class, [
                'label'=>'Catégories',
                'class'=>Category::class,
                'multiple'=>true,
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
