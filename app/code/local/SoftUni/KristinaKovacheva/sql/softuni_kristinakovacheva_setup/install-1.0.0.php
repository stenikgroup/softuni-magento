<?php
/** @var $installer Mage_Sales_Model_Entity_Setup*/
$installer = $this;
$installer->startSetup();

/** Create table 'softuni_kristinakovacheva/kristinakovacheva' */
$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_kristinakovacheva/kristinakovacheva'))
    ->addColumn('submission_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ), 'Submission Id')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'Name')
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'Phone')
    ->addColumn('age', Varien_Db_Ddl_Table::TYPE_INTEGER, array(
        'unsigned'  => true,
    ), 'Age')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, array(), 'Email');

$installer->getConnection()->createTable($table);

$installer->endSetup();