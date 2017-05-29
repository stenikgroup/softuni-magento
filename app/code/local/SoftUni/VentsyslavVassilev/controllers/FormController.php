<?php

class SoftUni_VentsyslavVassilev_FormController extends Mage_Core_Controller_Front_Action
{
    public function enterAction()
    {
        //die('Kur');
        $this->loadLayout();
        $this->renderLayout();
    }

    public function persistAction()
    {
        $post = Mage::app()->getRequest()->getPost();
        //var_dump($post); die();

        $postedData = Mage::getModel('softuni_ventsyslavvassilev/ventsyslavvassilev');
        $postedData->setData($post)->save();
        //var_dump($postedData); die();
        //$postedData // Not working - @todo - check why
        //$postedData->save();
        //die;
        $this->_redirectReferer();
    }
}