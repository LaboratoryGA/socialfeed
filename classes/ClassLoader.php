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

namespace Claromentis\Socialfeed;

/**
 * This is a simple classloader used for loading libraries easier
 *
 * @author Nathan Crause
 */
class ClassLoader {
	
	public static function register($namespace, $path) {
		spl_autoload_register(function($class) use ($namespace, $path) {
			// if the class's FQN doesn't start with socialfeed, abort
			if (strpos($class, $namespace . '\\') !== 0) {
				return false;
			}

			$path = $path . DIRECTORY_SEPARATOR
					. str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

			// if the file doesn't exist, short-circuit
			if (!file_exists($path)) {
				return false;
			}

			require_once $path;

			return true;
		});
	}
	
}
