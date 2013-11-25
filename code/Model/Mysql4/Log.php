<?php

class CosmoCommerce_Alipay_Model_Mysql4_Log extends Mage_Core_Model_Mysql4_Abstract {
    /**
     * Resource model initialization
     */
    protected function _construct() {
        $this->_init('alipay/log', 'alipay_id');
    }
}