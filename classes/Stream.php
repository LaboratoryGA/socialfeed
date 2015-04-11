<?php

/*
 * Copyright (C) 2015 Nathan Crause - All rights reserved
 *
 * This file is part of Socialfed
 *
 * Copying, modification, duplication in whole or in part without
 * the express written consent of the copyright holder is
 * expressly prohibited under the Berne Convention and the
 * Buenos Aires Convention.
 */

namespace Claromentis\Socialfeed;

/**
 * Retrieves posts for a specific provider and instance.
 *
 * @author Nathan Crause
 */
class Stream {
	
	/**
	 * The number of minutes which records should be kept alive
	 */
	const TTL = 15;
	
	/**
	 * Loops through all the instances, feeding all of them in
	 * 
	 * @global Configuration $cfg_socialfeed
	 */
	public static function all() {
		global $cfg_socialfeed;
		
		foreach ($cfg_socialfeed->getActiveProviders() as $provider) {
			foreach ($cfg_socialfeed->getProviderInstances($provider) as $name) {
				$feed = new self($provider, $name);
				
				$feed->run();
			}
		}
	}
	
	private $instance;
	
	private $info;
	
	public function __construct($provider, $name) {
		global $cfg_socialfeed;
		
		$this->info = [
			'provider'	=> $provider,
			'name'		=> $name
		];
		$this->instance = $cfg_socialfeed->getProviderInstance($provider, $name);
	}
	
	public function run() {
		$cache = new Cache($this->info['provider'] , $this->info['name']);
		$feed = $this->instance->connect()->getStream();
		
//		echo '<pre>To store: ' . print_r($feed, true) . '</pre>';
		
		$cache->set($feed);
//		die('<pre>Stored: ' . print_r($cache->get(), true) . '</pre>');
	}
	
}
