<?php

class SoftUni_Tulev_Adminhtml_TulevController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        return$this->renderLayout();
    }
}