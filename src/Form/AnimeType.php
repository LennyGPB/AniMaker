<?php

namespace App\Form;

use App\Entity\Anime;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class AnimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom de l'artiste",
                // Attr = permet d'ajouter des attributs HTML ( placeholder, class ...)
                 'attr' => [
                    'placeholder' => "saisir le nom"
                ]
            ])
            ->add('Auteur', TextType::class) // Texte normal
            ->add('nbEpisode', )
            ->add('nbSaison')
            ->add('dureeEp')
            ->add('videoURL', UrlType::class)
            ->add('description', TextareaType::class) // Long Texte
            // Menu déroulant avec plusieurs choix
            ->add('type', ChoiceType::class, [
                "choices" => [
                    "pro" => "pro",
                    "amateur"=> "amateur"
                ]
            ]) 
            
            
            
            
            // Ajouter un bouton valider avec un SubmitType
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Anime::class,
        ]);
    }
}
