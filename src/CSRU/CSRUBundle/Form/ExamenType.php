<?php

namespace CSRU\CSRUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExamenType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('date')
            ->add('type','text',array('label'=>'Type d\'examen'))
            ->add('taille')
            ->add('poids')
            ->add('tension')
            ->add('temperature')
            ->add('resultat','textarea',array('label'=>'Résultat de l\'examen'))
            ->add('groupe_saguin','choice', array('label'=>'Groupe Sanguin', 
                   'choices'=>array(
                '0'=>'',
                'A-'=>'A-',
                'A+'=>'A+',
                'B-'=>'B-',
                'B+'=>'B+',
                'AB'=>'AB',      
                'O-'=>'O-',
                'O+'=>'O+',      
                )))
           // ->add('DossierMedical')
           // ->add('utilisateur')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CSRU\CSRUBundle\Entity\Examen'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_examen';
    }
}
