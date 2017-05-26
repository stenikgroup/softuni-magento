<?php
class Stumbata_Submission_Model_Submission extends Mage_Core_Model_Abstract
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('stumbata_submission/submission');
    }
}