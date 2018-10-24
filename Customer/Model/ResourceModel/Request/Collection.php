<?php
/**
 * Customer price request collection
 */
namespace PriceRequest\Customer\Model\ResourceModel\Request;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package PriceRequest\Customer\Model\ResourceModel\Request\Collection
 *
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('PriceRequest\Customer\Model\Request', 'PriceRequest\Customer\Model\ResourceModel\Request');
    }
}
