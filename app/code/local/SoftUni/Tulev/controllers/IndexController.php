<?php

class SoftUni_Tulev_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction()
    {
        $this->loadLayout();
        return $this->renderLayout();
    }

// TODO ask about fatal error when using ....
    public function postAction()
    {
        $post = Mage::app()->getRequest()->getPost();
        $submission = Mage::getModel('softuni_tulev/submission');

        $submission->setName($post['name']);
        $submission->setAge($post['age']);
        $submission->setPhone($post['phone']);
        $submission->setEmail($post['email']);

        $submission->save();

        $this->_redirectReferer('submission/index/index');
    }
}