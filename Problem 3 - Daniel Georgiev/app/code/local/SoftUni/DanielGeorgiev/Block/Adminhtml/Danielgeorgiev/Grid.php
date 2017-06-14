<?php

class SoftUni_DanielGeorgiev_Block_Adminhtml_Danielgeorgiev_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuniDanielGeorgievGrid');
        $this->setDefaultSort('submission_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_danielgeorgiev/submission')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('submission_id', array(
            'header'    => Mage::helper('softuni_danielgeorgiev')->__('ID'),
            'index'     => 'submission_id',
        ));

        $this->addColumn('submission_name', array(
            'header'    => Mage::helper('softuni_danielgeorgiev')->__('Name'),
            'index'     => 'submission_name'
        ));

        $this->addColumn('submission_age', array(
            'header'    => Mage::helper('softuni_danielgeorgiev')->__('Age'),
            'index'     => 'submission_age'
        ));

        $this->addColumn('submission_telephone', array(
            'header'    => Mage::helper('softuni_danielgeorgiev')->__('Telephone'),
            'index'     => 'submission_telephone'
        ));

        $this->addColumn('submission_email', array(
            'header'    => Mage::helper('softuni_danielgeorgiev')->__('Email'),
            'index'     => 'submission_email'
        ));

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('submission_id' => $row->getId()));
    }

}