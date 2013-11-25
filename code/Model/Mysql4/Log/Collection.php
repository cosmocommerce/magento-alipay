<?php

class CosmoCommerce_Log_Model_Mysql4_Log_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
	
    protected function _construct() {
        $this->_init('alipay/log');
    }
}