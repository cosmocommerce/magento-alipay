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
class CosmoCommerce_Alipay_Model_Source_Banks
{
    public function getDebits(){
        $banks=array(
        "CMB-DEBIT"=>"CMB",
"CCB-DEBIT"=>"CCB",
"ICBC-DEBIT"=>"ICBC",
"COMM-DEBIT"=>"COMM",
"GDB-DEBIT"=>"GDB",
"BOC-DEBIT"=>"BOC",
"CEB-DEBIT"=>"CEB",
"SPDB-DEBIT"=>"SPDB",
"PSBC-DEBIT"=>"PSBC",
"BJBANK"=>"BJBANK",
"SHRCB"=>"SHRCB",
"WZCBB2C-DEBIT"=>"WZCB",
"COMM"=>"COMM");
        foreach($banks as $code=>$bank){
            $banks_options[]=array('value' => $code, 'label' => $bank);
        
        }
        return $banks_options;

    }
    
    public function getCompany(){
        $banks=array(
        "ICBCBTB"=>"ICBC",
"ABCBTB"=>"ABC",
"CCBBTB"=>"CCB",
"SPDBB2B"=>"SPDB",
"BOCBTB"=>"BOC",
"CMBBTB"=>"CMB");
        foreach($banks as $code=>$bank){
            $banks_options[]=array('value' => $code, 'label' => $bank);
        
        }
        return $banks_options;

    }
    public function getMixed(){
        $banks=array(
"BOCB2C"=>"BOC",
"ICBCB2C"=>"ICBC",
"CMB"=>"CMB",
"CCB"=>"CCB",
"ABC"=>"ABC",
"SPDB"=>"SPDB",
"CIB"=>"CIB",
"GDB"=>"GDB",
"CMBC"=>"CMBC",
"CITIC"=>"CITIC",
"HZCBB2C"=>"HZCB",
"CEBBANK"=>"CEB",
"SHBANK"=>"SHBANK",
"NBBANK"=>"NBBANK",
"SPABANK"=>"SPABANK",
"BJRCB"=>"BJRCB",
"FDB"=>"FDB",
"POSTGC"=>"PSBC",
//"abc1003"=>"visa",
//"abc1004"=>"master"
);
        foreach($banks as $code=>$bank){
            $banks_options[]=array('value' => $code, 'label' => $bank);
        
        }
        return $banks_options;

    }
    public function toOptionArray()
    {
    
    
    /*
    ICBCBTB 中国工商银行（B2B） 
ABCBTB 中国农业银行（B2B） 
CCBBTB 中国建设银行（B2B） 
SPDBB2B 上海浦东发展银行（B2B） 
BOCBTB 中国银行（B2B） 
CMBBTB 招商银行（B2B） 
BOCB2C 中国银行 
ICBCB2C 中国工商银行 √
CMB 招商银行 √
CCB 中国建设银行 √
ABC 中国农业银行 √
SPDB 上海浦东发展银行 √
CIB 兴业银行 
GDB 广发银行 √
CMBC 中国民生银行 
CITIC 中信银行 
HZCBB2C 杭州银行 
CEBBANK 中国光大银行 
SHBANK 上海银行 
NBBANK 宁波银行 
SPABANK 平安银行 
BJRCB 北京农村商业银行 
FDB 富滇银行 
POSTGC 中国邮政储蓄银行 
abc1003 visa 
abc1004 master 



CMB-DEBIT 招商银行 √
CCB-DEBIT 中国建设银行 √
ICBC-DEBIT 中国工商银行 √
COMM-DEBIT 交通银行 √
GDB-DEBIT 广发银行 √
BOC-DEBIT 中国银行 
CEB-DEBIT 中国光大银行 
SPDB-DEBIT 上海浦东发展银行 
PSBC-DEBIT 中国邮政储蓄银行 
BJBANK 北京银行 
SHRCB 上海农商银行 
WZCBB2C-DEBIT 温州银行
COMM 交通银行 

*/
        $banks=array("ABC"=>"中国农业银行",
"CCB"=>"中国建设银行",
"SPDB"=>"上海浦东发展银行",
"BOC"=>"中国银行",
"CMB"=>"招商银行",
"CIB"=>"兴业银行",
"GDB"=>"广发银行",
"CMBC"=>"中国民生银行",
"CITIC"=>"中信银行",
"HZCB"=>"杭州银行",
"CEB"=>"中国光大银行",
"SHBANK"=>"上海银行",
"NBBANK"=>"宁波银行",
"SPABANK"=>"平安银行",
"BJRCB"=>"北京农村商业银行",
"FDB"=>"富滇银行",
"PSBC"=>"中国邮政储蓄银行",
"COMM"=>"交通银行",
"BJBANK"=>"北京银行",
"SHRCB"=>"上海农商银行",
"WZCB"=>"温州市商业银行",
"ICBC"=>"中国工商银行");
        $banks_options=array();
        foreach($banks as $code=>$bank){
            $banks_options[]=array('value' => $code, 'label' => $bank);
        
        }
        return $banks_options;
    }
}





