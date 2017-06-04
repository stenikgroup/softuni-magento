<?php

class SoftUni_Tulev_Block_Adminhtml_Submission_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        $this->_objectId = 'submission_id';
        $this->_blockGroup = 'softuni_tulev';
        $this->_controller = 'adminhtml_submission';

        parent::__construct();
    }

    public function getHeaderText()
    {
        return Mage::helper('softuni_tulev')->__('New Submission');
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/submission/save');
    }
}