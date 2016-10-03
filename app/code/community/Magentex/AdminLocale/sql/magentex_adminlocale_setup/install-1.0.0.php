<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('magentex_adminlocale/user_locale'))
    ->addColumn(
        'entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary'  => true,
        ), 'Entity Id'
    )
    ->addColumn(
        'user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned' => true,
            'nullable' => false,
            'default'  => '0',
        ), 'User ID'
    )
    ->addColumn(
        'locale', Varien_Db_Ddl_Table::TYPE_TEXT, 6, array(
            'nullable' => false,
        ), 'Locale'
    )
    ->addIndex(
        $installer->getIdxName('magentex_adminlocale/user_locale', array('user_id')),
        array('user_id')
    )
    ->addForeignKey(
        $installer->getFkName('magentex_adminlocale/user_locale', 'user_id', 'admin/user', 'user_id'),
        'user_id', $installer->getTable('admin/user'), 'user_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
    );
$installer->getConnection()->createTable($table);

$installer->endSetup();