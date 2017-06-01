<?php

class SoftUni_Tulev_Model_Resource_Submission extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('softuni_tulev/submission', 'submission_id');

    }
}