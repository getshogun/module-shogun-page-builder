<?php

namespace ShogunLabs\ShogunPageBuilder\Block\Adminhtml;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Model\Auth\Session;
use ShogunLabs\ShogunPageBuilder\Helper\Data as DataHelper;

class Dashboard extends \Magento\Backend\Block\Template
{
    /**
     * @var string
     */
    protected $_template = 'ShogunLabs_ShogunPageBuilder::dashboard.phtml';

    /**
     * initialized:
     */

    protected $_adminSession;
    protected $_adminUser;
    protected $_dataHelper;

    /**
     * @method __construct
     * @param  Context                   $context
     * @param  Session                   $adminSession
     * @param  DataHelper                $dataHelper
     * @param  array                     $data
     */
    public function __construct(
        Context $context,
        Session $adminSession,
        DataHelper $dataHelper,
        array $data = []
    ) {
        $this->_adminSession=$adminSession;
        $this->_adminUser=$adminSession->getUser();
        $this->_dataHelper = $dataHelper;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    private function getAdminEmail()
    {
        return $this->_adminUser->getEmail();
    }

    /**
     * @return string
     */
    private function getConsumerKey()
    {
        return $this->_dataHelper->getConsumerKey();
    }

    /**
     * @return string
     */
    private function getConsumerSecret()
    {
        return $this->_dataHelper->getConsumerSecret();
    }

    /**
     * @return string
     */
    public function getMagicLink()
    {
        $payloadArray = [
            'magento_admin_email' => $this->getAdminEmail(),
            'magento_store_id' => $this->getStoreId(),
            'oauth_consumer_key' => $this->getConsumerKey(),
            'oauth_consumer_secret' => $this->getConsumerSecret()
        ];
        $base64EncodedPayload = base64_encode(json_encode($payloadArray));

        return 'https://getshogun.com/auth/magento/login?payload='.$base64EncodedPayload;
    }

    /**
     * @return string
     */
    private function getStoreId()
    {
        $storeId = $this->_dataHelper->getStoreId();
        if ($this->hasMultipleStores() || $storeId == null) {
            $storeId = $this->getRequest()->getParam('store', 0);
        }
        return $storeId;
    }

    /**
     * @return bool
     */
    public function hasMultipleStores()
    {
        return $this->_dataHelper->hasMultipleStores();
    }

    /**
     * @return bool
     */
    public function integrationExists()
    {
        return $this->_dataHelper->integrationExists();
    }

    /**
     * @return bool
     */
    public function integrationEnabled()
    {
        return $this->_dataHelper->integrationEnabled();
    }

    /**
     * @return bool
     */
    public function isGlobalStoreViewContext()
    {
        return $this->getRequest()->getParam('store', 0) == 0;
    }
}
