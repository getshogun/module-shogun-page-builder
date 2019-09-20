<?php

namespace Shogun\ShogunPageBuilder\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Shogun\ShogunPageBuilder\Helper\Data as DataHelper;

class RemoveStoreSwitcher implements ObserverInterface
{
    /**
     * @var DataHelper
     */
    protected $_dataHelper;

    public function __construct(
        DataHelper $dataHelper
    ) {
        $this->_dataHelper = $dataHelper;
    }

    public function execute(Observer $observer)
    {

        /**
         * @var \Magento\Framework\View\Layout $layout
         */
        $layout = $observer->getLayout();
        $hasMultipleStores = $this->_dataHelper->hasMultipleStores();

        if ($layout->getBlock('store_switcher') && $layout->getBlock('shogun_dashboard') && !$hasMultipleStores) {
            $layout->unsetElement('store_switcher');
        }

        return $this;
    }
}
