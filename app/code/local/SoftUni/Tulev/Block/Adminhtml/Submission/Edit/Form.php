<?php

class SoftUni_Tulev_Block_Adminhtml_Submission_Edit_Form extends
    Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form( array(
                'id' => 'edit_form',
                'action' => $this->getData('action'),
                'method' => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('softuni_tulev')->__('General Information'),
            'class' => 'fieldset-wide'
        ));

        $fieldset->addField('name', 'text', array(
            'name' => 'name',
            'label' => Mage::helper('softuni_tulev')->__('Submission Name'),
            'title' => Mage::helper('softuni_tulev')->__('Submission Name'),
            'required' => true
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}