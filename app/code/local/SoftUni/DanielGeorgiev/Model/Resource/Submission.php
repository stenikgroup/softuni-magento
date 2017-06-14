<?php

class SoftUni_DanielGeorgiev_Model_Resource_Submission extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('softuni_danielgeorgiev/submission', 'submission_id');
    }
}