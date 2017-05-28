<?php

$installer = $this;
$installer->startSetup();

$table = $installer
    ->getConnection()
    ->newTable($installer->getTable('softuni_tulev/submission'))
    ->addColumn('submission_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Submission Id')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Name')
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Phone')
    ->addColumn('age', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Age')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Email');

$installer->getConnection()->createTable($table);

$installer->endSetup();