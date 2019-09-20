<?php

namespace Shogun\ShogunPageBuilder\Model;

class Page extends \Magento\Cms\Model\Page implements \Shogun\ShogunPageBuilder\Api\Data\PageInterface
{
    /**
     * Get all Store IDs associated with a Page
     *
     * @return int[]
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Set Store IDs to the specified Page
     *
     * @param int[] $storeIds
     * @return \Shogun\ShogunPageBuilder\Api\Data\PageInterface
     */
    public function setStoreId($storeIds)
    {
        return $this->setData(self::STORE_ID, $storeIds);
    }
}
