<?php

class SoftUni_Submission_FormController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction()
    {
//        $post = Mage::app()->getRequest()->getPost();

        $submission = Mage::getModel('softuni_submission/submission');
        $submission->save(); // Not working - @todo - check why
        die;
        $this->_redirectReferer();
    }
}