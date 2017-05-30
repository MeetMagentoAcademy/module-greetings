<?php

namespace MMAcademy\Greetings\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $tableName = $installer->getTable('mmacademy_message');
        $table = $installer->getConnection()->newTable($tableName)->addColumn(
            'message_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Message ID'
        )->addColumn('author', Table::TYPE_TEXT, 255, [], 'Author')->addColumn(
            'value',
            Table::TYPE_TEXT,
            '2M',
            [],
            'Message'
        )->addColumn('creation_time', Table::TYPE_DATETIME, null, [], 'Created At');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}