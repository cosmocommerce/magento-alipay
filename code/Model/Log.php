<?php

class CosmoCommerce_Log_Model_Log extends Mage_Core_Model_Abstract
{
    /**
     * Model initialization
     *
     */
    protected function _construct()
    {
        $this->_init('alipay/log');
    }
    public function getYes()
    {
        return 'yes';
    }
}