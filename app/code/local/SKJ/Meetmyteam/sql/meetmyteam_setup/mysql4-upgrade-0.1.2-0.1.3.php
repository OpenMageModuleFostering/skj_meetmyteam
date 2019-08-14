<?php

$installer = $this;

$installer->startSetup();
$installer->run("

	ALTER TABLE `meetmyteam` CHANGE COLUMN `content` `contents` text NOT NULL default '';	

");

$installer->run("

	ALTER TABLE `meetmyteam` CHANGE COLUMN `category` `category` varchar(100) NOT NULL default '';	

");

$installer->endSetup();
