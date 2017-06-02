<?php

/**
 * Created by PhpStorm.
 * User: store
 * Date: 02.06.2017 г.
 * Time: 14:35
 */
class SoftUni_VentsyslavVassilev_Block_Adminhtml_VentsyslavVassilev extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {

        $this->_blockGroup = 'softuni_ventsyslavvassilev';
        $this->_controller = 'adminhtml_ventsyslavvassilev';
        $this->_headerText = Mage::helper('cms')->__('Submissions');
        $this->_addButtonLabel = Mage::helper('cms')->__('Add Submission');
        parent::__construct();
    }
}