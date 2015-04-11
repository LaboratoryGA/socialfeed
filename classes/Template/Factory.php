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

namespace Claromentis\Socialfeed\Template;

use TemplaterComponentTmpl;
use Claromentis\Socialfeed\Template\Engine\Component;

/**
 * This factory class provides several utility  methods for getting a template
 * engine instance.
 *
 * @author fiveht
 */
class Factory {
	
	public static function fromComponent(TemplaterComponentTmpl $component) {
		return new Component($component);
	}
	
	public static function raw() {
		
	}
	
}
