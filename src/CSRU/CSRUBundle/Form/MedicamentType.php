<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicamentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('quantite')
            ->add('prix')
            ->add('date','date')
            ->add('datePerime','date')
            ->add('centre');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Medicament'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_medicament';
    }
}
