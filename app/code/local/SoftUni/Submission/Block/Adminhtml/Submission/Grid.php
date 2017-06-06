<?php

class SoftUni_Submission_Block_Adminhtml_Submission_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuniSumissionGrid');
        $this->setDefaultSort('submission_id');
        $this->setDefaultDir('DESC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_submission/submission')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('submission_id', array(
            'header'    => Mage::helper('softuni_submission')->__('Submission ID'),
            'type'      => 'number',
            'index'     => 'submission_id',
        ));


        $this->addColumn('firstname', array(
            'header'    => Mage::helper('softuni_submission')->__('Fistname'),
            'type'      => 'text',
            'index'     => 'firstname',
        ));

        $this->addColumn('lastname', array(
            'header'    => Mage::helper('softuni_submission')->__('Lastname'),
            'type'      => 'text',
            'index'     => 'lastname',
        ));

        $this->addColumn('telephone', array(
            'header'    => Mage::helper('softuni_submission')->__('Telephone'),
            'type'      => 'text',
            'index'     => 'telephone',
        ));

        $this->addColumn('email', array(
            'header'    => Mage::helper('softuni_submission')->__('Email'),
            'type'      => 'text',
            'index'     => 'email',
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('softuni_submission')->__('Created At'),
            'type'      => 'date',
            'index'     => 'created_at',
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