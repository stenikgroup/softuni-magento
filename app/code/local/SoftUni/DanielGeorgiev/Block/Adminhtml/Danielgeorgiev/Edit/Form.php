<?php

class SoftUni_DanielGeorgiev_Block_Adminhtml_Danielgeorgiev_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuni_danielgeorgiev_submission_form');
        $this->setTitle(Mage::helper('softuni_danielgeorgiev')->__('Submission Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('softuni_danielgeorgiev_submission');

        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('adminhtml/softuni_danielgeorgiev_submission/save'),
                'method' => 'post'
            )
        );

        $form->setHtmlIdPrefix('softuni_danielgeorgiev_submission_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('softuni_danielgeorgiev')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getId()) {
            $fieldset->addField(
                'submission_id',
                'hidden', array(
                    'name' => 'submission_id',
                )
            );
        }

        $fieldset->addField('submission_name', 'text', array(
            'name'      => 'submission_name',
            'label'     => Mage::helper('softuni_danielgeorgiev')->__('Name'),
            'title'     => Mage::helper('softuni_danielgeorgiev')->__('Name'),
            'required'  => true,
        ));

        $fieldset->addField('submission_age', 'text', array(
            'name'      => 'submission_age',
            'label'     => Mage::helper('softuni_danielgeorgiev')->__('Age'),
            'title'     => Mage::helper('softuni_danielgeorgiev')->__('Age'),
        ));

        $fieldset->addField('submission_telephone', 'text', array(
            'name'      => 'submission_telephone',
            'label'     => Mage::helper('softuni_danielgeorgiev')->__('Telephone'),
            'title'     => Mage::helper('softuni_danielgeorgiev')->__('Telephone'),
        ));

        $fieldset->addField('submission_email', 'text', array(
            'name'      => 'submission_email',
            'label'     => Mage::helper('softuni_danielgeorgiev')->__('Email'),
            'title'     => Mage::helper('softuni_danielgeorgiev')->__('Email'),
            'required'  => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
