<?php
/**
 * PriceRequest Customer request search results interface
 */
namespace PriceRequest\Customer\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface RequestSearchResultsInterface
 *
 * @package PriceRequest\Customer\Api\Data\RequestSearchResultsInterface
 */
interface RequestSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get request list
     *
     * @return \PriceRequest\Customer\Api\Data\RequestInterface[]
     */
    public function getItems();

    /**
     * Set request list
     *
     * @param \PriceRequest\Customer\Api\Data\RequestInterface[] $items
     *
     * @return RequestSearchResultsInterface
     */
    public function setItems(array $items);
}
