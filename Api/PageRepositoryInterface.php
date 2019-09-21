<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ShogunLabs\ShogunPageBuilder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * CMS page CRUD interface.
 * @api
 * @since 100.0.2
 */
interface PageRepositoryInterface
{
    /**
     * Save page.
     *
     * @param \ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface $page
     * @return \ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface $page);

    /**
     * Retrieve page.
     *
     * @param int $pageId
     * @return \ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($pageId);

    /**
     * Retrieve pages matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Cms\Api\Data\PageSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete page.
     *
     * @param \ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface $page
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\ShogunLabs\ShogunPageBuilder\Api\Data\PageInterface $page);

    /**
     * Delete page by ID.
     *
     * @param int $pageId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($pageId);
}
