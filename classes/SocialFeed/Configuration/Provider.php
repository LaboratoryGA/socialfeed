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

namespace Claromentis\SocialFeed\Configuration;

/**
 * This interface defines just some basic bits of information for configuration
 * providers.
 *
 * @author Nathan Crause
 */
interface Provider {
	
	/**
	 * Generic name of the provider, such as "Facebook", or "Twitter"
	 * 
	 * @return string
	 */
	public function getName();
	
	/**
	 * Returns the communication protocol being used, such as "oauth" or "JSON"
	 * 
	 * @return string
	 */
	public function getProtocol();
	
	/**
	 * Returns the API version (of the provider) - we only expect the major
	 * version numbers (e.g. 1.2)
	 * 
	 * @return float
	 */
	public function getApiVersion();
	
	/**
	 * Given the rest of the configuration information in this configuration
	 * provider, this method should return an instance of the feed provider,
	 * ready for retrieving information.
	 * 
	 * @return socialfeed\Feed
	 */
	public function getFeed();
	
}
