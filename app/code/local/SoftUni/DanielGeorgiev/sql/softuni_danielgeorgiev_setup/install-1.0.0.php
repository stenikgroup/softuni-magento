<?php


/** @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

/**
 * Create table 'softuni_danielgeorgiev/submission'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_danielgeorgiev/submission'))
    ->addColumn('submission_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true
    ), 'Submission ID')
    ->addColumn('submission_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Submission Name')
    ->addColumn('submission_age', Varien_Db_Ddl_Table::TYPE_INTEGER, 3, array(
    ), 'Submission Age')
    ->addColumn('submission_telephone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Submission Telephone')
    ->addColumn('submission_email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Submission Email');

$installer->getConnection()->createTable($table);

$installer->endSetup();