<?php

class SoftUni_Submission_Block_Adminhtml_Submission_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'submission_id';
        $this->_blockGroup = 'softuni_submission';
        $this->_controller = 'adminhtml_submission';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('softuni_submission')->__('Save Submission'));
        $this->_updateButton('delete', 'label', Mage::helper('softuni_submission')->__('Delete Submission'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('block_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'block_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'block_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
}