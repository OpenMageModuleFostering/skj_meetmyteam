<?php

$installer = $this;

$installer->startSetup();

$installer->run("

		-- DROP TABLE IF EXISTS {$this->getTable('meetmyteam')};
		CREATE TABLE {$this->getTable('meetmyteam')} (
		`meetmyteam_id` int(11) unsigned NOT NULL auto_increment,
		`title` varchar(255) NOT NULL default '',
		`filename` varchar(255) NOT NULL default '',
		`category` int(11) NOT NULL default '0',
		`content` text NOT NULL default '',
		`description` text NOT NULL default '',
		`status` smallint(6) NOT NULL default '0',
		`created_time` datetime NULL,
		`update_time` datetime NULL,
		PRIMARY KEY (`meetmyteam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup();
