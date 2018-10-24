<?php
/**
 * Customer price request data provider
 */
namespace PriceRequest\Customer\Model\Request;

use PriceRequest\Customer\Model\ResourceModel\Request\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class DataProvider
 *
 * @package PriceRequest\Customer\Model\Request\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Request collection
     *
     * @var \PriceRequest\Customer\Model\ResourceModel\Request\Collection
     */
    protected $collection;

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Loaded data
     *
     * @var array
     */
    private $loadedData;

    /**
     * DataProvider constructor
     *
     * @param string                 $name
     * @param string                 $primaryFieldName
     * @param string                 $requestFieldName
     * @param CollectionFactory      $requestCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $requestCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $requestCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!isset($this->loadedData)) {
            $items = $this->collection->getItems();

            foreach ($items as $request) {
                $this->loadedData[$request->getId()] = $request->getData();
            }

            $data = $this->dataPersistor->get('customer_request_price');
            if (!empty($data)) {
                $request = $this->collection->getNewEmptyItem();
                $request->setData($data);
                $this->loadedData[$request->getId()] = $request->getData();
                $this->dataPersistor->clear('customer_request_price');
            }
        }

        return $this->loadedData;
    }
}
