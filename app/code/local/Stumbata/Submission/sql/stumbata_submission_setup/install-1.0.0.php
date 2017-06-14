<?php
/** @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();
/**
 * Create table 'stumbata_submission/submission'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('stumbata_submission/submission'))
    ->addColumn('ID', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Submission ID')
    ->addColumn('Name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Name')
    ->addColumn('Phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Telephone')
    ->addColumn('Email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Email');
$installer->getConnection()->createTable($table);

$installer->endSetup();