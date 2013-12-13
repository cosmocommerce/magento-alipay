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
 * @category	CosmoCommerce
 * @package 	CosmoCommerce_Alipay
 * @copyright	Copyright (c) 2009-2015 CosmoCommerce,LLC. (http://www.cosmocommerce.com)
 * @contact :
 * T: +86-021-66346672
 * L: Shanghai,China
 * M:sales@cosmocommerce.com
 */
$installer = $this;

$installer->startSetup();


$status = Mage::getModel('sales/order_status');
//担保交易 交易创建 等待买家付款
$status->setStatus('alipay_wait_buyer_pay')->setLabel('WAIT BUYER PAY')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    

$status = Mage::getModel('sales/order_status');
//担保交易 买家付款成功,等待卖家发货
$status->setStatus('alipay_wait_seller_send_goods')->setLabel('WAIT SELLER SEND GOODS')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 卖家已经发货等待买家确认
$status->setStatus('alipay_wait_buyer_confirm_goods')->setLabel('WAIT BUYER CONFIRM GOODS')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
$status = Mage::getModel('sales/order_status');
//担保交易 交易关闭
$status->setStatus('alipay_trade_closed')->setLabel('TRADE CLOSED')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-退款协议等待卖家确认中
$status->setStatus('alipay_wait_seller_agree')->setLabel('WAIT SELLER AGREE')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-卖家不同意协议，等待买家修改
$status->setStatus('alipay_seller_refuse_buyer')->setLabel('SELLER REFUSE BUYER')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-退款协议达成，等待买家退货
$status->setStatus('alipay_wait_buyer_return_goods')->setLabel('WAIT BUYER RETURN GOODS')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-等待卖家收货
$status->setStatus('alipay_wait_seller_confirm_goods')->setLabel('WAIT SELLER CONFIRM GOODS')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-退款成功
$status->setStatus('alipay_refund_success')->setLabel('REFUND SUCCESS')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-退款关闭
$status->setStatus('alipay_refund_closed')->setLabel('REFUND CLOSED')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-退款关闭
$status->setStatus('alipay_trade_success')->setLabel('TRADE SUCCESS')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
$status = Mage::getModel('sales/order_status');
//担保交易 退款状态-退款关闭
$status->setStatus('alipay_trade_finished')->setLabel('TRADE FINISHED')
    ->assignState(Mage_Sales_Model_Order::STATE_NEW) //for example, use any available existing state
    ->save();
    
    
    
$installer->endSetup();
