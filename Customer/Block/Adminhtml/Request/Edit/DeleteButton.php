<?php
/**
 * PriceRequest Customer price request delete button
 */
namespace PriceRequest\Customer\Block\Adminhtml\Request\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 *
 * @package PriceRequest\Customer\Block\Adminhtml\Request\Edit\DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getRequestId()) {
            $data = [
                'label' => __('Delete Request'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }

    /**
     * Get URL for delete button
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['request_id' => $this->getRequestId()]);
    }
}
