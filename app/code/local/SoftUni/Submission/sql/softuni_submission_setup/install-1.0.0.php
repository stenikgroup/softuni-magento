<?php

/** @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

/**
 * Create table 'softuni_submission/submission'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_submission/submission'))
    ->addColumn('submission_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Submission ID')
    ->addColumn('firstname', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Firstname')
    ->addColumn('lastname', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Lastname')
    ->addColumn('telephone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Telephone')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Email')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
    ), 'Created At');
$installer->getConnection()->createTable($table);

$installer->endSetup();
