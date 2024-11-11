<?php

namespace App\Form;

use App\Entity\Appraisal;
use App\Entity\Order;
use App\Repository\AppraisalRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderFormType extends AbstractType
{
    private Security $security;

    public function __construct(AppraisalRepository $appraisalRepository, Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('appraisal', EntityType::class, [
                'class' => Appraisal::class,
                'choice_label' => 'title',
                'choice_value' => 'id',
                'choice_attr' =>
                    function (Appraisal $appraisal, $key, $index) {
                        return ['data-cost' => $appraisal->getCost() ];
                    }
                ,
                'label' => 'Услуга ',
                'multiple' => false,
                'expanded' => false,
            ] )
            ->add('email',EmailType::class, [
                'data' => $this->security->getToken()->getUser()->getEmail(),
                'mapped' => false,
                'disabled' => true,
                'label' => 'Электронная почта',
            ])
            ->add('Order', SubmitType::class, [
                'label' => 'Заказать',
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
