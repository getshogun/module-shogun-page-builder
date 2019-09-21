<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ShogunLabs\ShogunPageBuilder\Api;

/**
 * CMS block CRUD interface.
 * @api
 * @since 100.0.2
 */
interface BlockRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface $block
     * @return \ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface $block);

    /**
     * Retrieve block.
     *
     * @param int $blockId
     * @return \ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($blockId);

    /**
     * Retrieve blocks matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Cms\Api\Data\BlockSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete block.
     *
     * @param \ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface $block
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\ShogunLabs\ShogunPageBuilder\Api\Data\BlockInterface $block);

    /**
     * Delete block by ID.
     *
     * @param int $blockId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($blockId);
}
