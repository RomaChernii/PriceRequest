<?php
/**
 * PriceRequest Customer request repository interface
 */
namespace PriceRequest\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use PriceRequest\Customer\Api\Data\RequestInterface;

/**
 * Interface RequestRepositoryInterface
 *
 * @package PriceRequest\Customer\Api\RequestRepositoryInterface
 */
interface RequestRepositoryInterface
{
    /**
     * Retrieve a request by its id
     *
     * @param $objectId
     *
     * @return RequestRepositoryInterface
     */
    public function getById($objectId);

    /**
     * Retrieve request which match a specified criteria.
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return RequestRepositoryInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save request
     *
     * @param RequestInterface $object
     *
     * @return RequestRepositoryInterface
     */
    public function save(RequestInterface $object);

    /**
     * Delete a request by its id
     *
     * @param int $objectId
     *
     * @return bool
     *
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($objectId);
}
