<?php

class SoftUni_Submission_Block_Adminhtml_Submission extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public  function __construct()
    {
        var_dump("opa");
        die();
        $this->_blockGroup = 'submission';
        $this->controller = 'adminhtml_submission';
        $this->_headerText = Mage::helper('submission')->__('Submissions');
        $this->_addButtonLabel = Mage::helper('submission')->__('Add New Submission');

        parent::__construct();
    }
}