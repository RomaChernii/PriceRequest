<?php
/**
 * PriceRequest Customer price request save
 */
namespace PriceRequest\Customer\Controller\Adminhtml\Request;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\DataObject;
use PriceRequest\Customer\Api\RequestRepositoryInterface;
use PriceRequest\Customer\Model\RequestFactory;

/**
 * Class Index
 *
 * @package PriceRequest\Customer\Controller\Adminhtml\Request
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'PriceRequest_Customer::request_save';

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Request repository interface
     *
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * Request factory
     *
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * Save constructor
     *
     * @param Action\Context             $context
     * @param Registry                   $coreRegistry
     * @param DataPersistorInterface     $dataPersistor
     * @param RequestRepositoryInterface $requestRepository
     * @param RequestFactory             $requestFactory
     */
    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        RequestRepositoryInterface $requestRepository,
        RequestFactory $requestFactory
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->dataPersistor = $dataPersistor;
        $this->requestRepository = $requestRepository;
        $this->requestFactory = $requestFactory;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $postObject = new DataObject();
            $postObject->setData($data);

            $id = $this->getRequest()->getParam('request_id');

            try {
                if (!$id) {
                    $model = $this->requestFactory->create();
                    $data['request_id']= null;
                } else {
                    $model = $this->requestRepository->getById($id);
                }

                $model->setData($data);
                $this->requestRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You save the request.'));
                $this->dataPersistor->clear('customer_request');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (NoSuchEntityException $e) {
                    $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                    $this->messageManager->addExceptionMessage($e, __('Something went wrong while save the request.'));
            }

            $this->dataPersistor->set('customer_request', $data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['request_id' => $this->getRequest()->getParam('request_id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
