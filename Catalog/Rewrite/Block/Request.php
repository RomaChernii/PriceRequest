<?php
/**
 * Catalog price request block
 */
namespace PriceRequest\Catalog\Rewrite\Block;

use Magento\Catalog\Pricing\Render;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class Request
 *
 * @package PriceRequest\Catalog\Block\Request
 */
class Request extends Render
{
    /**
     * Customer session
     *
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * Request constructor
     *
     * @param Context         $context
     * @param Registry        $registry
     * @param CustomerSession $customerSession
     * @param array           $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        CustomerSession $customerSession,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        parent::__construct(
            $context,
            $registry,
            $data
        );
    }

    /**
     * Get customer
     *
     * @return object
     */
    public function getCustomer()
    {
        $resalt = null;
        if ($this->customerSession->isLoggedIn()) {
            $resalt = $this->customerSession->getCustomer();
        }

        return $resalt;
    }

    /**
     * Get customer name
     *
     * @return string
     */
    public function getCustomerName()
    {
        $customer = $this->getCustomer();
        $resalt = '';
        if ($customer) {
            $resalt = $customer->getFirstname();
        }

        return $resalt;
    }

    /**
     * Get customer email
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        $customer = $this->getCustomer();
        $resalt = '';
        if ($customer) {
            $resalt = $customer->getEmail();
        }

        return $resalt;
    }

    /**
     * Get product sku
     *
     * @return string
     */
    public function getProductSku()
    {
      return $this->getProduct()->getSku();
    }
}
