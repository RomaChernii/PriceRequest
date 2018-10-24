<?php
/**
 * Customer price request
 */
namespace PriceRequest\Customer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Request
 *
 * @package PriceRequest\Customer\Model\ResourceModel\Request
 */
class Request extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('customer_request_price', 'request_id');
    }
}
