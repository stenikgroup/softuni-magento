<?php

class SoftUni_KristinaKovacheva_FormController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction()
    {
        $submission = Mage::getModel('softuni_kristinakovacheva/kristinakovacheva');
        $post = Mage::app()->getRequest()->getParams();
        foreach ($post as $key => $value){
            $command = 'set' . ucfirst($key);
            $submission->$command($value);
        }
        $submission->save();
//        add flash message
        Mage::getSingleton('core/session')->addSuccess(
            Mage::helper('SoftUni_KristinaKovacheva')->__('You just entered new submission!')
        );
//        die();
        $this->_redirectReferer();
    }
}