<?php
/**
 * PriceRequest Customer price request edit
 */
namespace PriceRequest\Customer\Controller\Adminhtml\Request;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use Magento\Framework\Exception\NoSuchEntityException;
use PriceRequest\Customer\Api\RequestRepositoryInterface;

/**
 * Class Edit
 *
 * @package PriceRequest\Customer\Controller\Adminhtml\Request\Edit
 */
class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'PriceRequest_Customer::request_save';

    /**
     * Core registry
     *
     * @var Registry
     */
    private $coreRegistry;

    /**
     * Page factory
     *
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * Request repository interface
     *
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * Edit constructor
     *
     * @param Action\Context             $context
     * @param PageFactory                $resultPageFactory
     * @param Registry                   $registry
     * @param RequestRepositoryInterface $requestRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        RequestRepositoryInterface $requestRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        $this->requestRepository = $requestRepository;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    private function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('PriceRequest_Customer::request')
            ->addBreadcrumb(__('Customer'), __('Customer'))
            ->addBreadcrumb(__('Manage Request'), __('Manage Request'));

        return $resultPage;
    }

    /**
     * Edit Request page
     *
     * @return \Magento\Backend\Model\View\Result\Page | \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                $model = $this->requestRepository->getById($id);
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('This request no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
            $this->coreRegistry->register('customer_request', $model);
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Request') : __('New Request'),
            $id ? __('Edit Request') : __('New Request')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Request Information'));

        return $resultPage;
    }
}
