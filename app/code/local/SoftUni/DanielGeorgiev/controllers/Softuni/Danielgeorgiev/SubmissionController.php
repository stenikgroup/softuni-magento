<?php

class SoftUni_DanielGeorgiev_Softuni_Danielgeorgiev_SubmissionController extends Mage_Adminhtml_Controller_Action
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
        $this->_title($this->__('Daniel Georgiev Submission'));

        $submissionId = $this->getRequest()->getParam('submission_id');
        $model = Mage::getModel('softuni_danielgeorgiev/submission');

        if($submissionId) {
            $model->load($submissionId);

            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('softuni_danielgeorgiev')->__('This submission no longer exists')
                );
                $this->_redirectReferer();
                return;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New submission'));

        // 3. Set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (! empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        Mage::register('softuni_danielgeorgiev_submission', $model);

        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction(){

        // check if data sent
        if ($data = $this->getRequest()->getPost()) {

            $submissionId = $this->getRequest()->getParam('submission_id');
            $model = Mage::getModel('softuni_danielgeorgiev/submission')->load($submissionId);
            if (!$model->getId() && $submissionId) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('softuni_danielgeorgiev')->__('This submission no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }

            // init model and set data

            $model->setData($data);

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('softuni_danielgeorgiev')->__('The submission has been saved.'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('submission_id' => $model->getId()));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/');
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
        $this->_redirect('*/*/');

    }

    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($submissionId = $this->getRequest()->getParam('submission_id')) {
            $title = "";
            try {
                // init model and delete
                $model = Mage::getModel('softuni_danielgeorgiev/submission');
                $model->load($submissionId);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('cms')->__('The submission has been deleted.'));
                // go to grid
                $this->_redirect('*/*/');
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
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('cms')->__('Unable to find a submission to delete.'));
        // go to grid
        $this->_redirect('*/*/');
    }

    public function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/softuni_danielgeorgiev');
    }
}