<?php

namespace Shogun\ShogunPageBuilder\Model;

use \Magento\User\Model\UserFactory;

class UserRepository implements \Shogun\ShogunPageBuilder\Api\UserRepositoryInterface
{
    /**
     * @var UserFactory
     */
    protected $_userFactory;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * @var array
     */
    private $users = [];

    /**
     * @param UserFactory $userFactory
     * @param \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     */
    public function __construct(
        UserFactory $userFactory,
        \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
    ) {

         $this->_userFactory = $userFactory;
         $this->searchResultsFactory = $searchResultsFactory;
         $this->dataObjectHelper = $dataObjectHelper;
         $this->dataObjectProcessor = $dataObjectProcessor;
    }

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {

        $searchResults = $this->searchResultsFactory;
        $searchResults->setSearchCriteria($searchCriteria);

        $userModel = $this->_userFactory->create();
        $userCollection = $userModel->getCollection()
          ->addFieldToSelect('user_id')
          ->addFieldToSelect('firstname', 'first_name')
          ->addFieldToSelect('lastname', 'last_name')
          ->addFieldToSelect('username')
          ->addFieldToSelect('email')
          ->addFieldToSelect('is_active');

        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $userCollection->addFieldToFilter($fields, $conditions);
            }
        }

        $searchResults->setTotalCount($userCollection->getSize());
        $userCollection->setCurPage($searchCriteria->getCurrentPage());
        $userCollection->setPageSize($searchCriteria->getPageSize());

        foreach ($userCollection as $user) {
            $this->users[] = $user->getData();
        }

        $this->searchResultsFactory->setItems($this->users);
        return $this->searchResultsFactory;
    }
}
