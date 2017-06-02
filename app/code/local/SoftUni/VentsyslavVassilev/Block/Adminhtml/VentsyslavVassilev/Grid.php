<?php

/**
 * Created by PhpStorm.
 * User: store
 * Date: 02.06.2017 г.
 * Time: 15:07
 */
class SoftUni_VentsyslavVassilev_Block_Adminhtml_VentsyslavVassilev_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('softuniVentsyslavVassilevGrid');
        //$this->setDefaultSort('submission_id');
        $this->setDefaultSort('ID');
        $this->setDefaultDir('DESC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_ventsyslavvassilev/ventsyslavvassilev')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $baseUrl = $this->getUrl();

        $this->addColumn('ID', array(
            'header'    => Mage::helper('softuni_ventsyslavvassilev')->__('Post ID'),
            'type'     => 'number',
            'index'     => 'ID'
        ));

        $this->addColumn('Name', array(
            'header'    => Mage::helper('softuni_ventsyslavvassilev')->__('Names'),
            'type'     => 'text',
            'index'     => 'Name'
        ));

        $this->addColumn('Phone', array(
            'header'    => Mage::helper('softuni_ventsyslavvassilev')->__('Phone'),
            'type'     => 'text',
            'index'     => 'Phone'
        ));

        $this->addColumn('Age', array(
            'header'    => Mage::helper('softuni_ventsyslavvassilev')->__('Age'),
            'type'     => 'integer',
            'index'     => 'Age'
        ));

        $this->addColumn('Email', array(
            'header'    => Mage::helper('softuni_ventsyslavvassilev')->__('Email'),
            'type'     => 'text',
            'index'     => 'Email'
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('ID' => $row->getId()));
    }

}