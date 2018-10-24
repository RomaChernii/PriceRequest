<?php
/**
 * PriceRequest Customer request interface
 */
namespace PriceRequest\Customer\Api\Data;

/**
 * Interface RequestInterface
 *
 * @package PriceRequest\Customer\Api\Data\RequestInterface
 */
interface RequestInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'customer_request_price';

    /**#@+
     * Constants defined for keys of data array.
     */
    const REQUEST_ID      = 'request_id';
    const CUSTOMER_NAME   = 'customer_name';
    const CUSTOMER_EMAIL  = 'customer_email';
    const PRODUCT_SKU     = 'product_sku';
    const REQUEST_CONTENT = 'request_content';
    const CREATION_TIME   = 'creation_time';
    const STATUS          = 'status';
    /**#@-*/

    /**
     * Get request ID
     *
     * @return int
     */
    public function getRequestId();

    /**
     * Get customer name
     *
     * @return string|null
     */
    public function getCustomerName();

    /**
     * Get customer email
     *
     * @return string|null
     */
    public function getCustomerEmail();

    /**
     * Get product sku
     *
     * @return string|null
     */
    public function getProductSku();

    /**
     * Get request content
     *
     * @return string|null
     */
    public function getRequestContent();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get status
     *
     * @return int|null
     */
    public function getStatus();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return RequestInterface
     */
    public function setRequestId($id);

    /**
     * Set customer name
     *
     * @param string $name
     *
     * @return RequestInterface
     */
    public function setCustomerName($name);

    /**
     * Set customer email
     *
     * @param string $email
     *
     * @return RequestInterface
     */
    public function setCustomerEmail($email);

    /**
     * Set product sku
     *
     * @param string $productSku
     *
     * @return RequestInterface
     */
    public function setProductSku($productSku);

    /**
     * Set request content
     *
     * @param string $content
     *
     * @return RequestInterface
     */
    public function setRequestContent($content);

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return RequestInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set status
     *
     * @param int $status
     *
     * @return RequestInterface
     */
    public function setStatus($status);
}
