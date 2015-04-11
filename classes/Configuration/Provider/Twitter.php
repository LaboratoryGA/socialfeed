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

namespace Claromentis\Socialfeed\Configuration\Provider;

use Claromentis\Socialfeed\Configuration\Provider;

/**
 * Configuration provider for integrating with Twitter
 *
 * @author Nathan Crause
 */
class Twitter implements Provider {

	public function getName() {
		return 'Twitter';
	}

	public function getProtocol() {
		return 'OAuth';
	}

	public function getApiVersion() {
		return '1.1';
	}
	
	public function connect() {
		throw new \Exception('Not yet implemented');
	}

}
