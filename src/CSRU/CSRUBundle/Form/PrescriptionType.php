<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrescriptionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                //->add('date')
                ->add('typeExamen', 'text', array('required' => false))
                ->add('MediPrescription', new MediPrescritType, array('required' => false))
                ->add('contenu', 'textarea', array('attr' => array('rows' => '10', 'cols' => '10'), 'required' => false))
                ->add('type', 'choice', array(
                    'choices' => array(
                        'Examen' => 'Examen',
                        'Ordonance' => 'Ordonance',
                    ), 'placeholder' => 'Choisir'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Prescription'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'csru_csrubundle_prescription';
    }

}
