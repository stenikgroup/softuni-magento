<?php

class SoftUni_Submission_Softuni_Submission_SubmissionController
    extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $this->_title($this->__('Submission'));

        // 1. Get ID and create model
        $submissionId = $this->getRequest()->getParam('submission_id');
        $model = Mage::getModel('softuni_submission/submission');

        if ($submissionId) {
            $model->load($submissionId);

            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('softuni_submission')->__('This submission no longer exists.')
                );
                $this->_redirectReferer();
                return;
            }
        }

        $this->_title(
            $model->getId() ?
                $model->getFirstname() . ' ' . $model->getLastname() :
                $this->__('New Submission')
        );

        // 3. Set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        Mage::register('softuni_submission_submission', $model);

        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        // check if data sent
        if ($data = $this->getRequest()->getPost()) {

            $submissionId = $this->getRequest()->getParam('submission_id');
            $model = Mage::getModel('softuni_submission/submission')->load($submissionId);
            if (!$model->getId() && $submissionId) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('softuni_submission')->__('This submission no longer exists.')
                );
                $this->_redirect('*/*/index');
                return;
            }

            // init model and set data

            $model->setData($data);

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('softuni_submission')->__('The submission has been saved.')
                );
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('submission_id' => $model->getId()));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/index');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // save data in session
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                // redirect to edit form
                $this->_redirect('*/*/edit', array('submission_id' => $this->getRequest()->getParam('submission_id')));
                return;
            }
        }
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($submissionId = $this->getRequest()->getParam('submission_id')) {
            try {
                // init model and delete
                $model = Mage::getModel('softuni_submission/submission');
                $model->load($submissionId);
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('softuni_submission')->__('The submission has been deleted.')
                );
                // go to grid
                $this->_redirect('*/*/index');
                return;
            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // go back to edit form
                $this->_redirect('*/*/edit', array('submission_id' => $submissionId));
                return;
            }
        }

        // display error message
        Mage::getSingleton('adminhtml/session')->addError(
            Mage::helper('softuni_submission')->__('Unable to find a submission to delete.')
        );
        // go to grid
        $this->_redirect('*/*/index');
    }



    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/softuni_submission');
    }
}