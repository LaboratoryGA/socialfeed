<?php

/* 
 * Copyright (C) 2015 Nathan Crause - All rights reserved
 *
 * This file is part of Socialfeed
 *
 * Copying, modification, duplication in whole or in part without
 * the express written consent of the copyright holder is
 * expressly prohibited under the Berne Convention and the
 * Buenos Aires Convention.
 */

if (!defined('INSTALL_PROGRESS')) {
	die('This file cannot be executed directly');
}

if (!isset($installer)) {
	throw new Exception('Install options are not defined');
}

/* @var $installer Claromentis\Setup\SetupFacade */

$adminPanel = new \Claromentis\Setup\AdminPanel();
$adminPanel->Create('socialfeed', '../socialfeed/admin.php', 
		['name' => 'Socialfeed', 'css_class' => 'icon-share']);

$configFile = $installer->GetConfigEditor();
$configFile->AddText('$cfg_cla_plugins[] = "Claromentis\Socialfeed\Plugin";');
