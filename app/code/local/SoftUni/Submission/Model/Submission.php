<?php

class SoftUni_Submission_Model_Submission extends Mage_Core_Model_Abstract
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('softuni_submission/submission');
    }
}