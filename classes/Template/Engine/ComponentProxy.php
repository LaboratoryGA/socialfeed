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

use TemplaterComponentTmpl;

/**
 * This class provides a means of accessing the "CallTemplater" method of a
 * given component.
 *
 * @author Nathan Crause
 */
class ComponentProxy extends TemplaterComponentTmpl {
	
	private $component;
	
	public function __construct(TemplaterComponentTmpl $component) {
		$this->component = $component;
	}
	
	public function Show($attributes) {
		return 'This component is not intended to be invoked.';
	}
	
	public function invokeTemplater($template, array $args) {
		return $this->component->CallTemplater($template, $args);
	}

}
