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

namespace Claromentis\Socialfeed\Data;

use Claromentis\Socialfeed\Configuration\Provider as ConfigProvider;

/**
 * This class defines the basic structure required
 *
 * @author Nathan Crause
 */
abstract class Provider {
	
	/**
	 *
	 * @var ConfigProvider
	 */
	protected $configuration;
	
	public function __construct(ConfigProvider $configuration) {
		$this->configuration = $configuration;
	}
	
	/**
	 * Retrieves the person whose account is being accessed.
	 * 
	 * @return Person
	 */
	public abstract function getPerson($id = NULL);
	
	/**
	 * Retrieves a stream of data from the social media source.
	 * 
	 * @return array[Post]
	 */
	public abstract function getStream();
	
}
