<?php

namespace FusionGrup\Bundle\RedBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_pais', null, array(
                    'label'=>'Ingrese su Pais',
                    'attr'=>array('class'=>'form form-control'),
                ))
            ->add('nomUsu',null,array(
                    'attr'=>array('class'=>'form form-control')
                ))
            ->add('apeUsu')
            ->add('fecUsu', null, array(
                    'label'=>'Ingrese su Fecha Nacimiento',
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',))
            ->add('mailUsu','email')
            ->add('fecUlt', 'date',  array(
                    'label'=>'Fecha de Ultimo Ingreso',
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',))
            ->add('fecIng', 'date',  array(
                    'label'=>'Fecha de Primer Ingreso',
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',))
            ->add('password')
            ->add('estUsu')
            ->add('user_roles')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FusionGrup\Bundle\RedBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fusiongrup_bundle_redbundle_usuario';
    }
}
