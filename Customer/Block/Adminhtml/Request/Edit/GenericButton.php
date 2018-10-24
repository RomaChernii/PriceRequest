<?php
/**
 * PriceRequest Customer price request generic button
 */
namespace PriceRequest\Customer\Block\Adminhtml\Request\Edit;

use Magento\Backend\Block\Widget\Context;
use PriceRequest\Customer\Api\RequestRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package PriceRequest\Customer\Block\Adminhtml\Request\Edit\GenericButton
 */
class GenericButton
{
    /**
     * Context
     *
     * @var Context
     */
    private $context;

    /**
     * Request repository interface
     *
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * GenericButton constructor
     *
     * @param Context                    $context
     * @param RequestRepositoryInterface $requestRepository
     */
    public function __construct(
        Context $context,
        RequestRepositoryInterface $requestRepository
    ) {
        $this->context = $context;
        $this->requestRepository = $requestRepository;
    }

    /**
     * Get request ID
     *
     * @return int
     */
    public function getRequestId()
    {
        $requestId = $this->context->getRequest()->getParam('request_id');

        return $this->requestRepository->getById($requestId)->getId();
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array  $params
     *
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
