<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('profession','choice' ,array('choices' => array('Infirmier' => 'Infirmier',
                                                                  'Prestataire' => 'Prestataire',
                                                                  'Administrateur' => 'Administrateur',)))
            ->add('adresse')
            ->add('telephone')
            ->add('centre','choice' ,array('choices' => array(
                        'null' => '',
                        'CENOU' => 'CENOU',
                        'CSRU FST' => 'CSRU FST',
                        'CSRU IPR' => 'CSRU IPR',
                        'CSRU SEGOU' => 'CSRU SEGOU',
                   )))
            ->add('age','date')
            ->add('image',new ImageType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Profil'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_profil';
    }
}
