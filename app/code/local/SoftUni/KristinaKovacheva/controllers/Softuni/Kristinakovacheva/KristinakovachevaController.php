<?php

class SoftUni_KristinaKovacheva_Softuni_Kristinakovacheva_KristinakovachevaController extends Mage_Adminhtml_Controller_Action
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
        $this->_title($this->__('KristinaKovacheva'));
//        1. Get ID and create model
        $submissionId = $this->getRequest()->getParam('submission_id');
        $model = Mage::getModel('softuni_kristinakovacheva/kristinakovacheva');
//        var_dump($model);
//        die;

//        2. Initial checking
        if($submissionId){
            $model->load($submissionId);
            if(!$model->getId()){
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('SoftUni_KristinaKovacheva')->__('This submission no longer exists')
                );
                $this->_redirectReferer();
                return;
            }
        }

        $this->_title(
            $model->getId() ?
                $model->getId() . ' ' . $model->getName() :
                $this->__('New submission')
        );

//        3. Set entered data if was error while saving
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if(!empty($data)){
            $model->setData($data);
        }

//        Register model to use later in block
        Mage::register('softuni_kristinakovacheva_kristinakovacheva', $model);

//        var_dump(Mage::registry('softuni_kristinakovacheva_kristinakovacheva'));die;

        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
//        check if Post data
        if($data = $this->getRequest()->getPost()){
            $submissionId = $this->getRequest()->getParam('submission_id');
            $model = Mage::getModel('softuni_kristinakovacheva/kristinakovacheva')->load($submissionId);
            if(!$model->getId() && $submissionId){
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('SoftUni_KristinaKovacheva')->__('This submission no longer exists!')
                );
                $this->_redirect('*/*/index');
                return;
            }

//            init model and set data
            $model->setData($data);

//            try to save it
            try {
//                save the data
                $model->save();
//                display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('SoftUni_KristinaKovacheva')->__('The submission has been saved!')
                );
//                clear previously saved model data in session
                Mage::getSingleton('adminhtml/session')->setFormData(false);

//                check if 'Save and continue'
                if($this->getRequest()->getParam('back')){
                    $this->_redirect('*/*/edit', array(
                        'submission_id'=>$model->getId()
                    ));
                    return;
                }

//                go to grid
                $this->_redirect('*/*/index');
                return;
            } catch (Exception $e){
//                display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

//                save model data in session
                Mage::getSingleton('adminhtml/session')->setFormData($data);
//                go back to edit form
                $this->_redirect('*/*/edit', array(
                    'submission_id' => $this->getRequest()->getParam('submission_id')
                ));
                return;
            }
        }
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
//        check if we know what should be deleted
        if($submissionId = $this->getRequest()->getParam('submission_id')){
            try{
                $model = Mage::getModel('softuni_kristinakovacheva/kristinakovacheva');
                $model->load($submissionId);
                $model->delete();
//                display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('SoftUni_KristinaKovacheva')->__(
                        'This submission has been deleted!'
                    )
                );
//                go to grid
                $this->_redirect('*/*/index');
                return;
            } catch (Exception $e){
//                display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

//                go back to edit form
                $this->_redirect('*/*/edit', array(
                    'submission_id' => $this->getRequest()->getParam('submission_id')
                ));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(
            Mage::helper('SoftUni_KristinaKovacheva')->__('This submission no longer exists!')
        );
//         go to grid
        $this->_redirect('*/*/index');

    }

    public function __isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/softuni_kristinakovacheva');
    }
}