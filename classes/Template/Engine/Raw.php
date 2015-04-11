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

namespace Claromentis\Socialfeed\Template\Engine;

use Claromentis\Socialfeed\Template\Engine;

/**
 * More rudimentary renderer, invoking the templaring subsystem directly.
 *
 * @author Nathan Crause
 */
class Raw implements Engine {
	
	public function render($template, array $args) {
		return process_cla_template($template, $args);
	}

}
