<?php

namespace Shogun\ShogunPageBuilder\Api;

interface StoreConfigInterface
{

    /**
     * GET for getDefaultCountry API
     * @param string $storeCode
     * @return string[]
     */
    public function getDefaultCountry($storeCode);
}
