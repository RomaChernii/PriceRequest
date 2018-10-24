<?php
/**
 * PriceRequest Customer price request index
 */
namespace PriceRequest\Customer\Controller\Adminhtml\Request;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

/**
 * Class Index
 *
 * @package PriceRequest\Customer\Controller\Adminhtml\Request\Index
 */
class Index extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'PriceRequest_Customer::request';

    /**
     * Page factory
     *
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * Index constructor
     *
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('PriceRequest_Customer::request');
        $resultPage->addBreadcrumb(__('Customer'), __('Customer'));
        $resultPage->addBreadcrumb(__('Manage Request'), __('Manage Request'));
        $resultPage->getConfig()->getTitle()->prepend(__('Request'));

        return $resultPage;
    }
}
