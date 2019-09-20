<?php

namespace Shogun\ShogunPageBuilder\Model;

class StoreConfigRepository implements \Shogun\ShogunPageBuilder\Api\StoreConfigInterface
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
         $this->scopeConfig = $scopeConfig;
         $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultCountry($storeCode)
    {
        if (empty($storeCode)) {
            $storeCode = 'default';
        }

        $countryParameter = \Magento\Config\Model\Config\Backend\Admin\Custom::XML_PATH_GENERAL_COUNTRY_DEFAULT;
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;

        $storeConfigData = [];
        $defaultCountry = $this->scopeConfig->getValue($countryParameter, $storeScope, $storeCode);
        $storeConfigData[] = ['code' => $storeCode, 'defaultCountry' => $defaultCountry];
        return $storeConfigData;
    }
}
