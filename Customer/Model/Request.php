<?php
/**
 * Customer price request model
 */
namespace PriceRequest\Customer\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use PriceRequest\Customer\Api\Data\RequestInterface;

/**
 * Class Request
 *
 * @package PriceRequest\Customer\Model\Request
 *
 */
class Request extends AbstractModel implements RequestInterface, IdentityInterface
{
    /**
     * Customer price request cache tag
     */
    const CACHE_TAG = 'customer_request_price';

    /**#@+
     * Request's statuses
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;
    /**#@-*/

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'customer_request_price';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'customer_request_price';

    /**
     * Request construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('PriceRequest\Customer\Model\ResourceModel\Request');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve request id
     *
     * @return int
     */
    public function getRequestId()
    {
        return $this->getData(self::REQUEST_ID);
    }

    /**
     * Retrieve request customer name
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * Retrieve request customer email
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * Retrieve request product sku
     *
     * @return string
     */
    public function getProductSku()
    {
        return (string)$this->getData(self::PRODUCT_SKU);
    }

    /**
     * Retrieve request content
     *
     * @return string
     */
    public function getRequestContent()
    {
        return $this->getData(self::REQUEST_CONTENT);
    }

    /**
     * Retrieve request creation time
     *
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Retrieve request status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return RequestInterface
     */
    public function setRequestId($id)
    {
        return $this->setData(self::REQUEST_ID, $id);
    }

    /**
     * Set entity name
     *
     * @param string $name
     *
     * @return RequestInterface
     */
    public function setCustomerName($name)
    {
        return $this->setData(self::CUSTOMER_NAME, $name);
    }

    /**
     * Set entity email
     *
     * @param string $email
     *
     * @return RequestInterface
     */
    public function setCustomerEmail($email)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $email);
    }

    /**
     * Set product sku
     *
     * @param string $productSku
     *
     * @return RequestInterface
     */
    public function setProductSku($productSku)
    {
        return $this->setData(self::PRODUCT_SKU, $productSku);
    }

    /**
     * Set request content
     *
     * @param string $requestContent
     *
     * @return RequestInterface
     */
    public function setRequestContent($requestContent)
    {
        return $this->setData(self::REQUEST_CONTENT, $requestContent);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return RequestInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set request status
     *
     * @param int $status
     *
     * @return RequestInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Prepare request's statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [
            self::STATUS_NEW => __('New'),
            self::STATUS_IN_PROGRESS => __('In progress'),
            self::STATUS_CLOSED => __('Closed')
        ];
    }
}
