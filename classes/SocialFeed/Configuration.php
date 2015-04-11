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

namespace Claromentis\SocialFeed;

/**
 * This class holds the configuration information for all the social media
 * feeds.
 *
 * @author Nathan Crause
 * @method socialfeed\config\providers\Facebook addFacebook(string $name) Adds a new named FaceBook instance
 * @method socialfeed\config\providers\Twitter addTwitter(string $name) Adds a new named Twitter instance
 * @method socialfeed\config\providers\LinkedIn addLinkedIn(string $name) Adds a new named LinkedIn instance
 */
class Configuration {
	
	/**
	 * Internal register of provide name and the associated class name
	 *
	 * @var array['provider'=>'ClassName'] 
	 */
	private static $mapping = array();
	
	public static function registerProvider($name, $class) {
		self::$mapping[$name] = $class;
	}
	
	/**
	 * Internal register for providers, and all instance names within that
	 * provider
	 *
	 * @var array['providerName'=>array['instanceName'=>Provider]] 
	 */
	private $providerRegistries = array();
	
	/**
	 * Add a new provider instance
	 * 
	 * @param string $providerName the provider name
	 * @param string $instanceName the distinct instance name
	 * @return socialfeed\config\Provider
	 */
	public function addProviderInstance($providerName, $instanceName = 'default') {
		// make sure the registry entry exists
		$this->providerRegistries[$providerName] = 
				$this->providerRegistries[$providerName] ?: array();
		// determine the class (by mapping) and create an instance
		$class = self::$mapping[$providerName];
		$object = new $class();
		// store the instance
		$this->providerRegistries[$providerName][$instanceName] = $object;
		
		return $object;
	}
	
	public function getProviderInstance($provider, $name) {
		$registry = ($this->providerRegistries[$provider] = 
				$this->providerRegistries[$provider] ?: array());
		
		return $registry[$name];
	}
	
	/**
	 * This method provides a shortcode to <code>addProvider()</code>. Invoking
	 * a method named <code>addFacebook</code> would cause an internal
	 * invocation of <code>addProvider('facebook')</code>
	 * 
	 * @param string $name the name of the method
	 * @param mixed $arguments
	 * @return socialfeed\config\Provider
	 */
	public function __call($name, $arguments) {
		// if the method doesn't start with "add", trigger an error
		if (!preg_match('/^add(.+)$/', $name, $matches)) {
			trigger_error("No such method: '$name'", E_USER_ERROR);
			return;
		}
		
		// extract the name of the provider
		$provider = strtolower($matches[1]);
		$args = $arguments ?: array();
		// push it into the argument array (at the beginning)
		array_unshift($args, $provider);
		
		return call_user_func_array(array($this, 'addProviderInstance'), $args);
	}
	
}
