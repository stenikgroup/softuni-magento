<?php
class Stumbata_Submission_Model_Resource_Submission extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Model Initialization
     *
     */
    protected function _construct()
    {
        $this->_init('stumbata_submission/submission', 'ID');
    }
}