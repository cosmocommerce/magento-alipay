<?php

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    CosmoCommerce
 * @package    CosmoCommerce_Alipay
 * @copyright    Copyright (c) 2009-2013 CosmoCommerce,LLC. (http://www.cosmocommerce.com)
 * @contact :
 * T: +86-021-66346672
 * L: Shanghai,China
 * M:sales@cosmocommerce.com
 */
class CosmoCommerce_Alipay_Block_Payment extends Mage_Core_Block_Template
{
    /**
     * Return order either from checkout session or from passed id
     *
     * @return bool|Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        $orderId = (int)$this->getRequest()->getParam('order_id');
        if (!$orderId) {
            $session = Mage::getSingleton('checkout/session');
            $_order = Mage::getModel('sales/order');

            $_order->loadByIncrementId($session->getLastRealOrderId());
        } else {
            $_order = Mage::getModel('sales/order')->load($orderId);

            $order_cid = $_order->getCustomerId();
            $current_cid = 0;
            if (Mage::helper('customer')->getCustomer()) {
                $current_cid = Mage::helper('customer')->getCustomer()->getId();
            }

            if ($current_cid != $order_cid) {
                Mage::log('Customer id doesnt match one for order' . $order_cid, null, 'alipay.log');
                return false;
            }
        }

        if (!$_order->getId()) {
            Mage::log('Order not found', null, 'alipay.log');
            return false;
        }

        return $_order;
    }

}