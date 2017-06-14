<?php
/** @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

$second_table = $installer->getConnection()
    ->newTable($installer->getTable('stumbata_submission_address/address'))
    ->addColumn('ID', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Submission ID')
    ->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER,null, array(
        'nullable' => false
    ), 'User id')
    ->addColumn('Address', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Adress');
$installer->getConnection()->createTable($second_table);

$installer->endSetup();