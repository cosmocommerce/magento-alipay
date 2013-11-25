<?php
$installer = $this;

$installer->startSetup();

Mage::log("Running installer");

$installer->run("
CREATE TABLE `{$this->getTable('alipay_log')}` (
  `alipay_id` int(10) unsigned NOT NULL auto_increment,
  `log_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `order_id` varchar(16) NOT NULL default '',
  `trade_no` varchar(20) NOT NULL default '',
  `type` int(2) NOT NULL default 1,
  `post_data` text,
  PRIMARY KEY  (`alipay_id`),
  KEY `log_at` (`log_at`),
  KEY `trade_no` (`trade_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

$installer->endSetup();
