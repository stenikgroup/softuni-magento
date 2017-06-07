<?php

class SoftUni_DanielGeorgiev_FormController extends Mage_Core_Controller_Front_Action
{
    public function submissionAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction()
    {
        $submission = Mage::getModel('softuni_danielgeorgiev/submission');

        $submission->setSubmissionName(Mage::app()->getRequest()->getPost('dg-submission-name'));
        $submission->setSubmissionAge(Mage::app()->getRequest()->getPost('dg-submission-age'));
        $submission->setSubmissionTelephone(Mage::app()->getRequest()->getPost('dg-submission-telephone'));
        $submission->setSubmissionEmail(Mage::app()->getRequest()->getPost('dg-submission-email'));

        $submission->save();

        $this->_redirectReferer();
    }
}