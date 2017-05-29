<?php

class SoftUni_Submission_Block_Form extends Mage_Core_Block_Template
{
    public function getActionUrl()
    {
        return $this->getUrl('softuni_submission/form/post');
    }
}