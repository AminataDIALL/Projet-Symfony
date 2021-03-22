<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MediPrescritType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomMedicament')
            ->add('quantiteMedicament')
            ->add('nbreMedicament','text',array('label'=>'Posologie'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\MediPrescrit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_mediprescrit';
    }
}
