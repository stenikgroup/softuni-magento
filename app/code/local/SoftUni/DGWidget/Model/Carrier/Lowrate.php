<?php

class SoftUni_DGWidget_Model_Carrier_Lowrate
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{

    protected $_code = 'softuni_dgwidget_lowrate';
    protected $_isFixed = true;

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        $result = Mage::getModel('shipping/rate_result');

        $shippingPrice = $this->getConfigData('price');

        $method = Mage::getModel('shipping/rate_result_method');

        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));

        $method->setMethod('lowrate');
        $method->setMethodTitle($this->getConfigData('name'));

        if ($request->getFreeShipping() === true) {
            $shippingPrice = '0';
        }


        $method->setPrice($shippingPrice);
        $method->setCost($shippingPrice);

        $result->append($method);

        return $result;
    }


    public function getAllowedMethods()
    {
        return array(
            'lowrate'=>$this->getConfigData('name')
        );
    }
}