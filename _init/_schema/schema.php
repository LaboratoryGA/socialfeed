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

/* @var $db \Claromentis\Core\DAL\Schema\SchemaDb */


if (!isset($migrations) || !is_object($migrations)) {
	die("This file cannot be executed directly");
}

if ($migrations->GetVersion() > 0) {
	throw new Exception("The database is already initialized");
}

// this table contains the authentication tokens
$db->CreateTable('socialfeed_auth', array(
	'id'			=> 'IDENTITY',
	'provider'		=> 'VARCHAR(255) NOT NULL',
	'instance'		=> 'VARCHAR(255) NOT NULL',
	'auth_tokens'	=> 'TEXT'
), true);

$db->CreateIndex('socialfeed_auth', 'socialfeed_auth_provider_instance', array(
	'provider',
	'instance'
));

$migrations->SetVersion('20150323');