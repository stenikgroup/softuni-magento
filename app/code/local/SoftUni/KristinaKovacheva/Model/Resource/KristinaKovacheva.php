<?php

class SoftUni_KristinaKovacheva_Model_Resource_KristinaKovacheva extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('softuni_kristinakovacheva/kristinakovacheva', 'submission_id');
    }
}