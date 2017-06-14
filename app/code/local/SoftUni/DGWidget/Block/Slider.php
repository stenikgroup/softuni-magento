<?php

class SoftUni_DGWidget_Block_Slider
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    public function getProductCollection()
    {
        $productCollection = Mage::getModel('catalog/product')->getCollection();

        $productCollection->addAttributeToSelect('name');
        Mage::getModel('catalog/layer')->prepareProductCollection($productCollection);

        $productCollection->addAttributeToFilter('price', array(
            'gt' => 200
        ));

        $productCollection->addAttributeToFilter('price', array(
            'lt' => 300
        ));

        $productCollection->setOrder('created_at', 'ASC');
        $productCollection->setPageSize(10);

        return $productCollection;
    }
}