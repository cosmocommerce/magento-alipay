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
 * @package     CosmoCommerce_Alipay
 * @copyright   Copyright (c) 2009-2013 CosmoCommerce,LLC. (http://www.cosmocommerce.com)
 * @contact :
 * T: +86-021-66346672
 * L: Shanghai,China
 * M:sales@cosmocommerce.com
 */
class CosmoCommerce_Alipay_PaymentController extends Mage_Core_Controller_Front_Action
{
    /**
     * Order instance
     */
    protected $_order;
	protected $_gateway="https://mapi.alipay.com/gateway.do?";

    /**
     *  Get order
     *
     *  @param    none
     *  @return	  Mage_Sales_Model_Order
     */
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

    /**
     * When a customer chooses Alipay on Checkout/Payment page
     *
     */
    public function redirectAction()
    {
        $session = Mage::getSingleton('checkout/session');
        $session->setAlipayPaymentQuoteId($session->getQuoteId());

        $order = $this->getOrder();

        if (!$order->getId())
        {
            $this->norouteAction();
            return;
        }

        $order->addStatusToHistory(
        $order->getStatus(),
        Mage::helper('alipay')->__('Customer was redirected to Alipay')
        );
        $order->save();

        $this->getResponse()
        ->setBody($this->getLayout()
        ->createBlock('alipay/redirect')
        ->setOrder($order)
        ->toHtml());

        $session->unsQuoteId();
    }

    public function notifyAction()
    {
        if ($this->getRequest()->isPost())
        {
            $postData = $this->getRequest()->getPost();
            $method = 'post';


        } else if ($this->getRequest()->isGet())
        {
            $postData = $this->getRequest()->getQuery();
            $method = 'get';

        } else
        {
            return;
        }
		$alipay = Mage::getModel('alipay/payment');
		
		$partner=$alipay->getConfigData('partner_id');
		$security_code=$alipay->getConfigData('security_code');
		$sign_type='MD5';
		$mysign="";
		$_input_charset='utf-8';
		$transport=$alipay->getConfigData('transport');
		
		$gateway = $this->_gateway;

		if($transport == "https") {
			$veryfy_url = $gateway. "service=notify_verify" ."&partner=" .$partner. "&notify_id=".$postData["notify_id"];
		} else {
			$veryfy_url = $gateway. "partner=".$partner."&notify_id=".$postData["notify_id"];
		}	

		$veryfy_result="";
		$veryfy_result  = $this->get_verify($veryfy_url);
		
		$post           = $this->para_filter($postData);
		
		
		$sort_post      = $this->arg_sort($post);
		
		$arg="";
		while (list ($key, $val) = each ($sort_post)) {
		
			$arg.=$key."=".$val."&";
		}
		$prestr="";
		$prestr = substr($arg,0,count($arg)-2);  //去掉最后一个&号
		$mysign = $this->sign($prestr.$security_code);
		
		
		Mage::log(strpos($veryfy_result,"true"));
		
		if ( $mysign == $postData["sign"])  {
			
			
			if($postData['trade_status'] == 'WAIT_BUYER_PAY') {                   //等待买家付款
				
				$order = Mage::getModel('sales/order');
				$order->loadByIncrementId($postData['out_trade_no']);
				//$order->setAlipayTradeno($postData['trade_no']);
				// $order->sendNewOrderEmail();
				$order->addStatusToHistory(
				$order->getStatus(),
				Mage::helper('alipay')->__('等待买家付款。'));
				try{
					$order->save();
					echo "success";
				} catch(Exception $e){
					
				}
			}
			else if($postData['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {      //买家付款成功,等待卖家发货
				
				$order = Mage::getModel('sales/order');
				$order->loadByIncrementId($postData['out_trade_no']);
				//$order->setAlipayTradeno($postData['trade_no']);
				// $order->sendNewOrderEmail();
				$order->addStatusToHistory(
				$alipay->getConfigData('order_status_payment_accepted'),
				Mage::helper('alipay')->__('买家付款成功,等待卖家发货。'));
				try{
					$order->save();
					echo "success";
				} catch(Exception $e){
					
				}
			}
			else if($postData['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {    //卖家已经发货等待买家确认
			
				$order = Mage::getModel('sales/order');
				$order->loadByIncrementId($postData['out_trade_no']);
				//$order->setAlipayTradeno($postData['trade_no']);
				// $order->sendNewOrderEmail();
				$order->addStatusToHistory(
				$alipay->getConfigData('order_status_payment_accepted'),
				Mage::helper('alipay')->__('卖家已经发货等待买家确认。'));
				try{
					$order->save();
					echo "success";
				} catch(Exception $e){
				}

			}
			else if($postData['trade_status'] == 'TRADE_FINISHED' || $postData['trade_status'] == "TRADE_SUCCESS") {   
				$order = Mage::getModel('sales/order');
				$order->loadByIncrementId($postData['out_trade_no']);
				//$order->setAlipayTradeno($postData['trade_no']);
				$order->setStatus(Mage_Sales_Model_Order::STATE_PROCESSING);
				// $order->sendNewOrderEmail();
				$order->addStatusToHistory(
				$alipay->getConfigData('order_status_payment_accepted'),
				Mage::helper('alipay')->__('买家已付款,交易成功结束。'));
				try{
					$order->save();
					echo "success";
				} catch(Exception $e){
					
				}

			}
			else {
				echo "fail";
				Mage::log("x");
			}	

		} else {
			echo "fail";
		}
    }

	public function get_verify($url,$time_out = "60") {
		$urlarr     = parse_url($url);
		$errno      = "";
		$errstr     = "";
		$transports = "";
		if($urlarr["scheme"] == "https") {
			$transports = "ssl://";
			$urlarr["port"] = "443";
		} else {
			$transports = "tcp://";
			$urlarr["port"] = "80";
		}
		$fp=@fsockopen($transports . $urlarr['host'],$urlarr['port'],$errno,$errstr,$time_out);
		if(!$fp) {
			die("ERROR: $errno - $errstr<br />\n");
		} else {
			fputs($fp, "POST ".$urlarr["path"]." HTTP/1.1\r\n");
			fputs($fp, "Host: ".$urlarr["host"]."\r\n");
			fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
			fputs($fp, "Content-length: ".strlen($urlarr["query"])."\r\n");
			fputs($fp, "Connection: close\r\n\r\n");
			fputs($fp, $urlarr["query"] . "\r\n\r\n");
			while(!feof($fp)) {
				$info[]=@fgets($fp, 1024);
			}
			fclose($fp);
			$info = implode(",",$info);
			$arg="";
			while (list ($key, $val) = each ($_POST)) {
				$arg.=$key."=".$val."&";
			}

		return $info;
		}

	}
    /**
     *  Alipay response router
     *
     *  @param    none
     *  @return	  void
     public function notifyAction()
     {
     $model = Mage::getModel('alipay/payment');
     
     if ($this->getRequest()->isPost()) {
     $postData = $this->getRequest()->getPost();
     $method = 'post';
     } else if ($this->getRequest()->isGet()) {
     $postData = $this->getRequest()->getQuery();
     $method = 'get';
     } else {
     $model->generateErrorResponse();
     }
     $order = Mage::getModel('sales/order')
     ->loadByIncrementId($postData['reference']);
     if (!$order->getId()) {
     $model->generateErrorResponse();
     }
     if ($returnedMAC == $correctMAC) {
     if (1) {
     $order->addStatusToHistory(
     $model->getConfigData('order_status_payment_accepted'),
     Mage::helper('alipay')->__('Payment accepted by Alipay')
     );
     
     $order->sendNewOrderEmail();
     if ($this->saveInvoice($order)) {
     //                $order->setState(Mage_Sales_Model_Order::STATE_PROCESSING, true);
     }
     
     } else {
     $order->addStatusToHistory(
     $model->getConfigData('order_status_payment_refused'),
     Mage::helper('alipay')->__('Payment refused by Alipay')
     );
     
     // TODO: customer notification on payment failure
     }
     
     $order->save();
     } else {
     $order->addStatusToHistory(
     Mage_Sales_Model_Order::STATE_CANCELED,//$order->getStatus(),
     Mage::helper('alipay')->__('Returned MAC is invalid. Order cancelled.')
     );
     $order->cancel();
     $order->save();
     $model->generateErrorResponse();
     }
     }
     */
     /**
     *  Save invoice for order
     *
     *  @param    Mage_Sales_Model_Order $order
     *  @return	  boolean Can save invoice or not
     */
    protected function saveInvoice(Mage_Sales_Model_Order $order)
    {
        if ($order->canInvoice())
        {
            $convertor = Mage::getModel('sales/convert_order');
            $invoice = $convertor->toInvoice($order);
            foreach ($order->getAllItems() as $orderItem)
            {
                if (!$orderItem->getQtyToInvoice())
                {
                    continue ;
                }
                $item = $convertor->itemToInvoiceItem($orderItem);
                $item->setQty($orderItem->getQtyToInvoice());
                $invoice->addItem($item);
            }
            $invoice->collectTotals();
            $invoice->register()->capture();
            Mage::getModel('core/resource_transaction')
            ->addObject($invoice)
            ->addObject($invoice->getOrder())
            ->save();
            return true;
        }

        return false;
    }

    /**
     *  Success payment page
     *
     *  @param    none
     *  @return	  void
     */
    public function successAction()
    {
        $session = Mage::getSingleton('checkout/session');
        $session->setQuoteId($session->getAlipayPaymentQuoteId());
        $session->unsAlipayPaymentQuoteId();

        $order = $this->getOrder();

        if (!$order->getId())
        {
            $this->norouteAction();
            return;
        }

        $order->addStatusToHistory(
        $order->getStatus(),
        Mage::helper('alipay')->__('Customer successfully returned from Alipay')
        );

        $order->save();

        $this->_redirect('checkout/onepage/success');
    }

    /**
     *  Failure payment page
     *
     *  @param    none
     *  @return	  void
     */
    public function errorAction()
    {
        $session = Mage::getSingleton('checkout/session');
        $errorMsg = Mage::helper('alipay')->__(' There was an error occurred during paying process.');

        $order = $this->getOrder();

        if (!$order->getId())
        {
            $this->norouteAction();
            return;
        }
        if ($order instanceof Mage_Sales_Model_Order && $order->getId())
        {
            $order->addStatusToHistory(
            Mage_Sales_Model_Order::STATE_CANCELED,//$order->getStatus(),
            Mage::helper('alipay')->__('Customer returned from Alipay.').$errorMsg
            );

            $order->save();
        }

        $this->loadLayout();
        $this->renderLayout();
        Mage::getSingleton('checkout/session')->unsLastRealOrderId();
    }
	
	
    
	public function sign($prestr) {
		$mysign = md5($prestr);
		return $mysign;
	}
    
	public function para_filter($parameter) {
		$para = array();
		while (list ($key, $val) = each ($parameter)) {
			if($key == "sign" || $key == "sign_type" || $val == "")continue;
			else	$para[$key] = $parameter[$key];

		}
		return $para;
	}
	
	public function arg_sort($array) {
		ksort($array);
		reset($array);
		return $array;
	}

	public function charset_encode($input,$_output_charset ,$_input_charset ="GBK" ) {
		
		$output = "";
		if($_input_charset == $_output_charset || $input ==null) {
			$output = $input;
		} elseif (function_exists("mb_convert_encoding")){
			$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
		} elseif(function_exists("iconv")) {
			$output = iconv($_input_charset,$_output_charset,$input);
		} else die("sorry, you have no libs support for charset change.");
		
		return $output;
	}	
}
