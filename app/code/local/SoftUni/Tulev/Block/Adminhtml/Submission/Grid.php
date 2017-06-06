<?php

class SoftUni_Tulev_Block_Adminhtml_Submission_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function getRowUrl($item){
        return $this->getUrl('*/submission/edit', array('submission_id' => $item->getId()));
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_tulev/submission')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name', array(
            'type' => 'text',
            'index' => 'name',
            'header' => $this->__('Name')
        ));

        $this->addColumn('email', array(
            'type' => 'text',
            'index' => 'email',
            'header' => $this->__('Email')
        ));

        return $this;
    }

}















