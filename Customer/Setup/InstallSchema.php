<?php
/**
 * Customer install schema
 *
 * @category  PriceRequest
 * @package   PriceRequest\Customer
 * @author    Roman Chernii
 */
namespace PriceRequest\Customer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package PriceRequest\Customer\Setup\InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install tabel customer_request_price
     *
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('customer_request_price')
        )->addColumn(
            'request_id',
            Table::TYPE_SMALLINT,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true
            ],
            'Request price ID'
        )->addColumn(
            'customer_name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Customer Name'
        )->addColumn(
            'customer_email',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Customer Email'
        )->addColumn(
            'product_sku',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Customer Email'
        )->addColumn(
            'request_content',
            Table::TYPE_TEXT,
            '64k',
            [],
            'Request Content'
        )->addColumn(
            'creation_time',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT
            ],
            'Request Creation Time'
        )->addColumn(
            'status',
            Table::TYPE_SMALLINT,
            null,
            [
                'nullable' => false,
                'default' => 1
            ],
            'Request Status'
        )->addIndex(
            $setup->getIdxName(
                $installer->getTable('customer_request_price'),
                ['customer_name', 'customer_email', 'request_content'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['customer_name', 'customer_email', 'request_content'],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->addForeignKey(
        'FK_CUSTOMER_REQUEST_PRICE_TO_CATEGORY_PRODUCT',
        'product_sku',
            $setup->getTable('catalog_product_entity'),
            'sku',
        Table::ACTION_CASCADE
        )->setComment(
            'Request Price Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
