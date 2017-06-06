<?php

class SoftUni_Tulev_Adminhtml_SubmissionController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('submission');

        $this->_addContent(
            $this->getLayout()->createBlock('softuni_tulev/adminhtml_submission')
        );

        return $this->renderLayout();
    }

    public function saveAction()
    {
        $submissionId = $this->getRequest()->getParam('submission_id');
        $submissionModel = Mage::getModel('softuni_tulev/submission')->load($submissionId);

        if ( $data = $this->getRequest()->getPost() ) {
            try {
                $submissionModel->addData($data)->save();
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess($this->__("Your submission has been saved!")
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->setSubmissionFormData($data);
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('_current' => true));
            }
        }

        $this->_redirect('*/*/index');
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        if ($submissionId = $this->getRequest()->getParam('submissionId')) {
            Mage::register('current_submission', Mage::getModel('softuni_tulev/submission')->load($submissionId));
        }

        $this->loadLayout();
        $this->_setActiveMenu('submission');

        $this->_addContent($this->getLayout()->createBlock('softuni_tulev/adminhtml_submission_edit'));

        return $this->renderLayout();
    }

    // TODO => Check the format of the alert confirming the deletion!
    public function deleteAction()
    {
        $submissionId = $this->getRequest()->getParam('submission_id');
        $submissionModel = Mage::getModel('softuni_tulev/submission')->load($submissionId);

        try {
            $submissionModel->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(
                $this->__("Submission has been deleted successfully")
            );
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/edit', array('_current' => true));
        }

        $this->_redirect('*/*/index');
    }

    public function massDeleteAction()
    {
        if ($submissionIds = $this->getRequest()->getParam('submission_ids')) {
           try {
               foreach ($submissionIds as $submissionId) {
                   $model = Mage::getModel('softuni_tulev/submission')->load($submissionId);
                   $model->delete();
               }
               Mage::getSingleton('adminhtml/session')->addSuccess(
                   $this->__("%d submission(s) deleted successfully", count($submissionIds)
               ));
           } catch (Exception $e) {
               Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
           }
        } else {
            Mage::getSingleton('adminhtml/session')->addError(
                $this->__('You must select a submission(s) to delete.')
            );
        }

        $this->_redirect('*/*/index');
    }
}
