<?php

namespace Shogun\ShogunPageBuilder\Helper;

use Magento\Integration\Model\IntegrationService;
use Magento\Integration\Api\OauthServiceInterface as IntegrationOauthService;
use Magento\Store\Model\StoreManagerInterface as StoreManagerService;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * initialized:
     */

    protected $_integrationService;
    protected $_oauthService;
    protected $_storeManager;

    /**
     * @method __construct
     * @param  IntegrationService        $integrationService
     * @param  IntegrationOauthService   $oauthService
     * @param  StoreManagerService       $storeManager
     */
    public function __construct(
        IntegrationService $integrationService,
        IntegrationOauthService $oauthService,
        StoreManagerService $storeManager
    ) {
        $this->_integrationService=$integrationService;
        $this->_oauthService=$oauthService;
        $this->_storeManager=$storeManager;
    }

    /**
     * @return \Magento\Integration\Model\Oauth\Consumer
     */
    private function getConsumer()
    {
        $integration = $this->getIntegration();
        $consumerId = $integration->getConsumerId();
        return $this->_oauthService->loadConsumer($consumerId);
    }

    /**
     * @return string
     */
    public function getConsumerKey()
    {
        $consumer = $this->getConsumer();
        return $consumer->getKey();
    }

    /**
     * @return string
     */
    public function getConsumerSecret()
    {
        $consumer = $this->getConsumer();
        return $consumer->getSecret();
    }

    /**
     * @return \Magento\Integration\Model\Integration
     */
    private function getIntegration()
    {
        return $this->_integrationService->findByName('Shogun Page Builder - Integration');
    }

    /**
     * @return int
     */
    public function getStoreCount()
    {
        $storesArray = $this->_storeManager->getStores();
        return count($storesArray);
    }

    /**
     * @return \Magento\Store\Model\Store;
     */
    private function getStoreDefault()
    {
        return $this->_storeManager->getDefaultStoreView();
    }

    /**
     * @return string
     */
    public function getStoreId()
    {
        return $this->getStoreDefault()->getId();
    }

    /**
     * @return bool
     */
    public function hasMultipleStores()
    {
        return $this->getStoreCount() > 1;
    }

    /**
     * @return bool
     */
    public function integrationExists()
    {
        $integration = $this->getIntegration();

        return $integration->getId() !== null;
    }

    /**
     * @return bool
     */
    public function integrationEnabled()
    {
        $isEnabled = false;

        if ($this->integrationExists()) {
            $integration = $this->getIntegration();
            $status = $integration->getStatus();
            $setupType = $integration->getSetupType();

            $isEnabled = $status == 1 && $setupType == 1;
        }

        return $isEnabled;
    }
}
