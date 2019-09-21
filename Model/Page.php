<?php

namespace ShogunLabs\ShogunPageBuilder\Model;

class Page extends \Magento\Cms\Model\Page implements \ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface
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
     * @return \ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface
     */
    public function setStoreId($storeIds)
    {
        return $this->setData(self::STORE_ID, $storeIds);
    }
}
