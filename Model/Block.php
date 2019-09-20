<?php

namespace Shogun\ShogunPageBuilder\Model;

class Block extends \Magento\Cms\Model\Block implements \Shogun\ShogunPageBuilder\Api\Data\BlockInterface
{
    /**
     * Get all Store IDs associated with a Block
     *
     * @return int[]
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Set Store IDs to the specified Block
     *
     * @param int[] $storeIds
     * @return \Shogun\ShogunPageBuilder\Api\Data\BlockInterface
     */
    public function setStoreId($storeIds)
    {
        return $this->setData(self::STORE_ID, $storeIds);
    }
}
