<?php

class SoftUni_KristinaKovacheva_Block_Adminhtml_KristinaKovacheva_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuniKristinakovachevaGrid');
        $this->setDefaultSort('submission_id');
        $this->setDefaultDir('DESC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_kristinakovacheva/kristinakovacheva')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('submission_id', array(
            'header' => Mage::helper('SoftUni_KristinaKovacheva')->__('Submission ID'),
            'type' => 'number',
            'index' => 'submission_id',
        ));
        $this->addColumn('name', array(
            'header' => Mage::helper('SoftUni_KristinaKovacheva')->__('Name'),
            'type' => 'text',
            'index' => 'name',
        ));
        $this->addColumn('phone', array(
            'header' => Mage::helper('SoftUni_KristinaKovacheva')->__('Phone'),
            'type' => 'text',
            'index' => 'phone',
        ));
        $this->addColumn('age', array(
            'header' => Mage::helper('SoftUni_KristinaKovacheva')->__('Age'),
            'type' => 'number',
            'index' => 'age',
        ));
        $this->addColumn('email', array(
            'header' => Mage::helper('SoftUni_KristinaKovacheva')->__('Email'),
            'type' => 'text',
            'index' => 'email',
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array(
            'submission_id' => $row->getId()
        ));
    }
}