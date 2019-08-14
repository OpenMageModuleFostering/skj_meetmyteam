<?php

$installer = $this;

$installer->startSetup();
$installer->run("

	ALTER TABLE `meetmyteam` ADD `position` int( 11 ) NOT NULL DEFAULT 0 ;

");
$installer->endSetup();
