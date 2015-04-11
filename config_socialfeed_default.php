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

use Claromentis\SocialFeed\Configuration;

// register all the default social media services
Configuration::registerProvider('facebook', 'Claromentis\SocialFeed\Configuration\Provider\Facebook');
Configuration::registerProvider('twitter', 'Claromentis\SocialFeed\Configuration\Provider\Twitter');
Configuration::registerProvider('linkedin', 'Claromentis\SocialFeed\Configuration\Provider\LinkedIn');
Configuration::registerProvider('google+', 'Claromentis\SocialFeed\Configuration\Provider\Google');
Configuration::registerProvider('instagram', 'Claromentis\SocialFeed\Configuration\Provider\Instagram');
Configuration::registerProvider('youtube', 'Claromentis\SocialFeed\Configuration\Provider\YouTube');

$cfg_socialfeed = new Configuration();

$cfg_socialfeed->addFacebook()
		->setAppID('210301132424295')
		->setAppSecret('75407e2280fd24eb147c3d08cd7e340c')
		->setResource('Claromentis');

//$cfg_socialfeed->addTwitter()
//		->setBlahblahfishpaste();
//
//$cfg_socialfeed->addProvider('linkedin')
//		->setYakityShmakkity();