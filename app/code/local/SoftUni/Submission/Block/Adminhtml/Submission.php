<?php

class SoftUni_Submission_Block_Adminhtml_Submission
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'softuni_submission';
        $this->_controller = 'adminhtml_submission';
        $this->_headerText = Mage::helper('cms')->__('Submissions');
        $this->_addButtonLabel = Mage::helper('cms')->__('Add New Submission');
        parent::__construct();
    }
}