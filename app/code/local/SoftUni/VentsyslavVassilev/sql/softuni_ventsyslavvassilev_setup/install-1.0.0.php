<?php

/** @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_ventsyslavvassilev/ventsyslavvassilev'))
    ->addColumn('ID', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Primary key - ID')
    ->addColumn('Name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Name')
    ->addColumn('Phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Phone')
    ->addColumn('Age', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Age')
    ->addColumn('Email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Email');
$installer->getConnection()->createTable($table);

$installer->endSetup();
