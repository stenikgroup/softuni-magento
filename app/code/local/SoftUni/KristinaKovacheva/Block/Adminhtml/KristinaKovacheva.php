<?php

class SoftUni_KristinaKovacheva_Block_Adminhtml_KristinaKovacheva
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'softuni_kristinakovacheva';
        $this->_controller = 'adminhtml_kristinakovacheva';
        $this->_headerText = Mage::helper('SoftUni_KristinaKovacheva')->__('KristinaKovacheva');
        $this->_addButtonLabel = Mage::helper('SoftUni_KristinaKovacheva')->__('Add new');
        parent::__construct();
    }
}