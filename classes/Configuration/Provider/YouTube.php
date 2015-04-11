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
 * Configuration provider for integrating with YouTube
 *
 * @author Nathan Crause
 */
class YouTube implements Provider {

	public function getName() {
		return 'YouTube';
	}

	public function getProtocol() {
		return 'OAuth';
	}

	public function getApiVersion() {
		return '1.1.3';
	}
	
	public function connect() {
		throw new \Exception('Not yet implemented');
	}
}
