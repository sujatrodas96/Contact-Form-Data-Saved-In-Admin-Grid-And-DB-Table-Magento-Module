<?php
namespace CustomForm\FormData\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('customform_formdata')
        )->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Entity ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Name'
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Email'
        )->addColumn(
            'phone',
            Table::TYPE_TEXT,
            15,
            ['nullable' => false],
            'Phone'
        )->addColumn(
            'domain',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Domain'
        )->addColumn(
            'country',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Country'
        )->addColumn(
            'state',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'State'
        )->setComment(
            'Custom Form Data Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}


