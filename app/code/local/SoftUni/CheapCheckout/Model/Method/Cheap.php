<?php

class SoftUni_CheapCheckout_Model_Method_Cheap extends Mage_Payment_Model_Method_Abstract
{
    protected $_code  = 'softuni_cheapcheckout_cheap';

    protected $_formBlockType = 'payment/form_cashondelivery';
    protected $_infoBlockType = 'payment/info';

    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }
}