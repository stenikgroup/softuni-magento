<?php

class SoftUni_Tulev_Adminhtml_SubmissionController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('tulev/submissions');

        $this->_addContent(
            $this->getLayout()->createBlock('softuni_tulev/adminhtml_submission_edit')
        );

        return $this->renderLayout();
    }

    public function saveAction()
    {
//        $submissionId = $this->getRequest()->getParam('submission_id');
//        $submissionModel = Mage::getModel('')->
    }
}






































