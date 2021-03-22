<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HospitalisationType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                //->add('date')
                ->add('hopital','text',array('label' =>'Nom Hôpital'))
                ->add('pavillon')
                ->add('salle')
                ->add('lit')
                ->add('motif', 'textarea');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Hospitalisation'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'csru_csrubundle_hospitalisation';
    }

}
