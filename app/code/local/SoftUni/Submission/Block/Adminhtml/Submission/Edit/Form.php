<?php

class SoftUni_Submission_Block_Adminhtml_Submission_Edit_Form
    extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuni_submission_submission_form');
        $this->setTitle(Mage::helper('softuni_submission')->__('Submission Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('softuni_submission_submission');

        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'action' => $this->getUrl('adminhtml/softuni_submission_submission/save'),
            'method' => 'post'
        ));

        $form->setHtmlIdPrefix('softuni_submission_submission_');

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('cms')->__('General Information'),
            'class' => 'fieldset-wide'
        ));

        if ($model->getId()) {
            $fieldset->addField('submission_id', 'hidden', array(
                'name' => 'submission_id',
            ));
        }

        $fieldset->addField('firstname', 'text', array(
            'name'      => 'firstname',
            'label'     => Mage::helper('softuni_submission')->__('Firstname'),
            'title'     => Mage::helper('softuni_submission')->__('Firstname'),
            'required'  => true,
        ));

        $fieldset->addField('lastname', 'text', array(
            'name'      => 'lastname',
            'label'     => Mage::helper('softuni_submission')->__('Lastname'),
            'title'     => Mage::helper('softuni_submission')->__('Lastname'),
            'required'  => true,
        ));

        $fieldset->addField('telephone', 'text', array(
            'name'      => 'telephone',
            'label'     => Mage::helper('softuni_submission')->__('Telephone'),
            'title'     => Mage::helper('softuni_submission')->__('Telephone'),
            'required'  => false,
        ));

        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('softuni_submission')->__('Email'),
            'title'     => Mage::helper('softuni_submission')->__('Email'),
            'required'  => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}