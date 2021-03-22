<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtudiantType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('genre','choice' ,array('choices' => array(
                        'Masculin' => 'Masculin',
                        'Féminin' => 'Féminin',
                   )))
            ->add('age','date',array(
                    'label' => 'Age',
                    'format' => 'dd-MM-yyyy',
                    'years' => range(1960, 2030),
                ))
            ->add('lieuDeNaissance')
            ->add('matricule')
            ->add('universite','choice' ,array('choices' => array(
                        'USTTB' => 'USTTB',
                        'USSGB' => 'USSGB',
                        'USJPB' => 'USJPB',
                        'ULSHB' => 'ULSHB',
                        'US' => 'US',
                        
                   )))
            ->add('faculte','choice' ,array('choices' => array(
                        'FST' => 'FST',
                        'ISA' => 'ISA',
                        'FMOS' => 'FMOS',
                        'FAPH' => 'FAPH',
                        'FSEG' => 'FSEG',
                        
                   )))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Etudiant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_etudiant';
    }
}
