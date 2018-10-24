<?php
/**
 * PriceRequest Customer price request status
 */
namespace PriceRequest\Customer\Model\Request\Source;

use Magento\Framework\Data\OptionSourceInterface;
use PriceRequest\Customer\Model\Request;

/**
 * Class Status
 *
 * @package PriceRequest\Customer\Model\Request\Source\Status
 */
class Status implements OptionSourceInterface
{
    /**
     * Request
     *
     * @var Request
     */
    private $request;

    /**
     * Status constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->request->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }

        return $options;
    }
}
