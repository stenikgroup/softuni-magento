<?php

class SoftUni_CheapCheckout_Block_Widget_Product_List
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    public function getProductCollection()
    {
        $productCollection = Mage::getModel('catalog/product')->getCollection();

        $productCollection->addAttributeToSelect('name');

        Mage::getModel('catalog/layer')->prepareProductCollection($productCollection);

        $productCollection->setOrder('created_at', 'DESC');

        $productCollection->addAttributeToFilter('price', array(
            'gt' => 200
        ));

        $productCollection->addAttributeToFilter('price', array(
            'lt' => 300
        ));

        //$productCollection->addFieldToFilter('price', 200)

        $productCollection->setPageSize(10);

        return $productCollection;
    }
}