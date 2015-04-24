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

namespace Claromentis\Socialfeed\Data\Provider;

use Claromentis\Socialfeed\Data\Provider as DataProvider;
use Claromentis\Socialfeed\Configuration\Provider as ConfigProvider;
use Claromentis\Socialfeed\Data\Person;
use Claromentis\Socialfeed\Data\Post\LinkedIn as LinkedInPost;

use LinkedIn\LinkedIn;

/**
 * Concrete implementation of a data provider
 *
 * @author Nathan Crause <nathan at crause.name>
 */
class LinkedIn extends DataProvider {
	
	private $api;
	
	public function __construct(\Claromentis\Socialfeed\Configuration\Provider $configuration) {
		parent::__construct($configuration);
		
		$this->api = new LinkedIn([
			'api_key'		=> $configuration->getApiKey(),
			'api_secret'	=> $configuration->getSecretKey(),
			'callback_url'	=> 'http://chicken.coop'
		]);
	}
	
	public function getPerson($id = NULL) {
		throw new Exception('Not implemented');
	}

	public function getStream() {
		
	}

}
