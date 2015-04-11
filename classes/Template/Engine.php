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

/**
 * This interface defines the single method which all templater engines must
 * expose.
 *
 * @author Nathan Crause
 */
interface Engine {
	
	public function render($template, array $args);
	
}
