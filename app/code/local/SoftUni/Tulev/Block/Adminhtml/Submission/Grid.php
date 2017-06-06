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

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('submission_id');
        $this->getMassactionBlock()->setFormFieldName('submission_ids');

        $this->getMassactionBlock()->addItem('delete_submission', array(
            'label' => Mage::helper('softuni_tulev')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('softuni_tulev')->__('Are you sure?')
        ));

        return $this;
    }

}















