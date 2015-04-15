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
\Claromentis\Socialfeed\ClassLoader::register('Facebook', realpath(__DIR__ . '/lib/facebook-php-sdk-v4-4.0-dev/src'));
\Claromentis\Socialfeed\ClassLoader::register('TwitterOAuth', realpath(__DIR__ . '/lib/TwitterOAuth-2/src'), true);

function legacy_facebook_exists() {
	return key_exists('cfg_social_stream_facebook_page', $GLOBALS)
			&& key_exists('cfg_facebook_app_id', $GLOBALS)
			&& key_exists('cfg_facebook_app_secret', $GLOBALS);
}

function legacy_twitter_exists() {
	return key_exists('cfg_social_stream_twitter_streams', $GLOBALS)
			&& key_exists('cfg_twitter_consumer_key', $GLOBALS)
			&& key_exists('cfg_twitter_consumer_secret', $GLOBALS);
}

// load the custom configuration for this module
ClaApplication::LoadConfig('socialfeed');

// Look for legacy configurations, and merge them into $cfg_socialfeed
/* @var $cfg_socialfeed Claromentis\Socialfeed\Configuration */
global $cfg_socialfeed;

// if there are legacies present
if ((legacy_facebook_exists() || legacy_twitter_exists()) && $cfg_socialfeed->getPurgeOnLegacy()) {
	$cfg_socialfeed->purge();
}

// check for legacy facebook configuration
if (legacy_facebook_exists()) {
	// add peculiar "fb" reference used in legacy implementation
	\Claromentis\Socialfeed\Configuration::registerProvider('fb', 'Claromentis\SocialFeed\Configuration\Provider\Facebook');
	
	foreach ($GLOBALS['cfg_social_stream_facebook_page'] as $page) {
		$resource = trim($page, '/');
		
		$cfg_socialfeed->addFacebook("legacy-facebook-{$resource}")
				->setAppID($GLOBALS['cfg_facebook_app_id'])
				->setAppSecret($GLOBALS['cfg_facebook_app_secret'])
				->setResource($resource);
		// also add in the legacy "FB" reference (but leave it as "default")
		$cfg_socialfeed->addProviderInstance('fb')
				->setAppID($GLOBALS['cfg_facebook_app_id'])
				->setAppSecret($GLOBALS['cfg_facebook_app_secret'])
				->setResource($resource);
	}
}

// check for legacy twitter configuration
if (legacy_twitter_exists()) {
	foreach ($GLOBALS['cfg_social_stream_twitter_streams'] as $screenName) {
		$cfg_socialfeed->addTwitter("legacy-twitter-{$screenName}")
				->setConsumerKey($GLOBALS['cfg_twitter_consumer_key'])
				->setConsumerSecret($GLOBALS['cfg_twitter_consumer_secret'])
				->setScreenName($screenName);
	}
}
