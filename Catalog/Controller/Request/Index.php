<?php
/**
 * Catalog price request action
 */
namespace PriceRequest\Catalog\Controller\Request;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use PriceRequest\Customer\Model\RequestFactory;
use PriceRequest\Customer\Api\RequestRepositoryInterface;

/**
 * Class Index
 *
 * @package PriceRequest\Catalog\Controller\Request\Index
 */
class Index extends Action
{
    /**
     * Request factory
     *
     * @var RequestFactory
     */
    protected $requestFactory;

    /**
     * Request repository interface
     *
     * @var RequestRepositoryInterface
     */
    protected $requestRepository;

    /**
     * Index constructor
     *
     * @param Context                    $context
     * @param RequestFactory             $requestFactory
     * @param RequestRepositoryInterface $requestRepository
     */
    public function __construct(
        Context $context,
        RequestFactory $requestFactory,
        RequestRepositoryInterface $requestRepository
    )
    {
        $this->requestFactory = $requestFactory;
        $this->requestRepository = $requestRepository;
        parent::__construct($context);
    }

    /**
     * Request action
     *
     * @return void
     *
     * @throws \Exception
     */
    public function execute()
    {
        try{
            if ($this->getRequest()->isAjax()) {
                $data = $this->getRequest()->getParams();
                $model = $this->requestFactory->create();
                $model->setData($data);
                $this->requestRepository->save($model);
                $this->messageManager->addSuccessMessage(__('Your request has been successfully sent'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}
