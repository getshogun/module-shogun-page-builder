<?php

namespace ShogunLabs\ShogunPageBuilder\Api\Data;

interface BlockInterface extends \Magento\Cms\Api\Data\BlockInterface
{
    /**
     * Store ID array attribute associating a cms_block with one or more cms_block_stores
     */
    const STORE_ID = 'store_id';

    /**
     * Get Store Ids
     *
     * @return int[]
     */
    public function getStoreId();

    /**
     * Set Store Ids
     *
     * @param int[] $storeIds
     * @return \ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface
     */
    public function setStoreId($storeIds);
}
