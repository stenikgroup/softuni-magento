<?php
class Stumbata_Submission_FormController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function postAction()
    {
        $post = Mage::app()->getRequest()->getPost();
        $submission = Mage::getModel('stumbata_submission/submission');
        $submission->setData($post);
        $submission->save();
        $this->_redirectReferer();
    }
}