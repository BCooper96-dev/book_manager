<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Title', 'constraints'=>[ new NotBlank(['message'=>'Please enter a title for the book'])]])
            ->add('author', TextType::class, ['label' => 'Author', 'constraints'=>[ new NotBlank(['message'=>'Please enter the author of the book'])]])
            ->add('genre', TextType::class, ['label' => 'Genre', 'required'=> false,])
            ->add('summary', TextType::class, ['label' => 'summary', 'required'=> false,])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}