<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AntecedantType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('date','date')
            ->add('type','choice', array('label'=>'Catégorie Antécédent', 
                   'choices'=>array(
                '0'=>'',
                'medicaux'=>'Médicaux',
                'chirigicaux'=>'Chirigicaux',
                'familiaux'=>'Familiaux',
                'allergies'=>'Allergies',
                'medicaux'=>'Médicaux',
                'mention particulieres'=>'Mention particulières') ))
            ->add('description', 'textarea', array('attr' => array('rows' => '10','cols' => '10')))
           // ->add('dossierMedical')
           // ->add('utilisateur')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Antecedant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_antecedant';
    }
}
