<?php

namespace Shogun\ShogunPageBuilder\Api\Data;

interface PageInterface extends \Magento\Cms\Api\Data\PageInterface
{
    /**
     * Store ID array attribute associating a cms_page with one or more cms_page_stores
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
     * @return \Shogun\ShogunPageBuilder\Api\Data\PageInterface
     */
    public function setStoreId($storeIds);
}
