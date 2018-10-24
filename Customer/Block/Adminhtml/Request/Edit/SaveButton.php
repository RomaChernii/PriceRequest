<?php
/**
 * PriceRequest Customer price request save button
 */
namespace PriceRequest\Customer\Block\Adminhtml\Request\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 *
 * @package PriceRequest\Customer\Block\Adminhtml\Request\Edit\SaveButton
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get save button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'button' => [
                        'event' => 'save'
                    ]
                ],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
