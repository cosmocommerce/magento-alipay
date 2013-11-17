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
 * @copyright	Copyright (c) 2009-2013 CosmoCommerce,LLC. (http://www.cosmocommerce.com)
 * @contact :
 * T: +86-021-66346672
 * L: Shanghai,China
 * M:sales@cosmocommerce.com
 */
class CosmoCommerce_Alipay_Block_Redirect extends Mage_Core_Block_Abstract
{

    protected $_order;
    protected function _construct()
    {   
        parent::_construct();
    }

    public function getOrder()
    {
        if ($this->_order == null)
        {
            $session = Mage::getSingleton('checkout/session');
            $this->_order = Mage::getModel('sales/order');
            
            $this->_order->loadByIncrementId($session->getLastRealOrderId());
        }
        return $this->_order;
    }
	protected function _toHtml()
	{
		$standard = Mage::getModel('alipay/payment');
        $form = new Varien_Data_Form();
        $form->setAction($standard->getAlipayUrl())
            ->setId('alipay_payment_checkout')
            ->setName('alipay_payment_checkout')
            ->setMethod('GET')
            ->setUseContainer(true);
        foreach ($standard->setOrder($this->getOrder())->getStandardCheckoutFormFields() as $field => $value) {
            $form->addField($field, 'hidden', array('name' => $field, 'value' => $value));
        }
        
        $formHTML = $form->toHtml();
        $html= $formHTML;
        $html.="<script type='text/javascript'>function payorder(){document.getElementById('alipay_payment_checkout').submit();}</script>";
        $html.= '
        <button type="submit" title="下订单" class="button btn-checkout" onclick="payorder();"><span><span>下订单</span></span></button>';

        return $html;
    }
}