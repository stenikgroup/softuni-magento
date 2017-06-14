<?php

class SoftUni_DanielGeorgiev_Block_Adminhtml_Danielgeorgiev extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'softuni_danielgeorgiev';
        $this->_controller = 'adminhtml_danielgeorgiev';
        $this->_headerText = Mage::helper('cms')->__('Daniel Georgiev Submissions');
        $this->_addButtonLabel = Mage::helper('cms')->__('Add New Submissions');
        parent::__construct();
    }
}