<?php

class SoftUni_Tulev_Block_Adminhtml_Submission extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public  function __construct()
    {
        $this->_blockGroup = 'softuni_tulev';
        $this->_controller = 'adminhtml_submission';
        $this->_headerText = Mage::helper('softuni_tulev')->__('Submissions');
        $this->_addButtonLabel = Mage::helper('softuni_tulev')->__('Add New Submission');

        parent::__construct();
    }
}