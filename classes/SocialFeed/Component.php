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

namespace Claromentis\SocialFeed;

/**
 * This component renders contents from various social media sources
 *
 * @author Nathan Crause
 */
class Component extends TemplaterComponentTmpl {
	
	/**
	 * 
	 * @global socialfeed\Configuration $cfg_socialfeed
	 * @param array $attributes
	 * @return string
	 */
	public function Show($attributes) {
		ClaApplication::Enter('socialfeed');
		
		global $cfg_socialfeed;
		
		return '<pre>' . print_r($cfg_socialfeed->getProviderInstance('facebook', 'default'), true) . '</pre>';
	}
	
}
