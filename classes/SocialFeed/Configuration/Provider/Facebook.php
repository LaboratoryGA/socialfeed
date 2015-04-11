<?php

/*
 * Copyright (C) 2015 Nathan Crause - All rights reserved
 *
 * This file is part of Intranet_Labs
 *
 * Copying, modification, duplication in whole or in part without
 * the express written consent of the copyright holder is
 * expressly prohibited under the Berne Convention and the
 * Buenos Aires Convention.
 */

namespace Claromentis\SocialFeed\Configuration\Provider;

/**
 * Description of Facebook
 *
 * @author fiveht
 */
class Facebook implements \socialfeed\config\Provider {

	public function getName() {
		return 'Facebook';
	}

	public function getProtocol() {
		return 'oauth';
	}
	
	public function getApiVersion() {
		return '1.0';
	}

	public function getFeed() {
		return null;
	}
	
	protected $appID;
	
	public function getAppID() {
		return $this->appID;
	}

	/**
	 * 
	 * @param type $appID
	 * @return \socialfeed\config\providers\Facebook
	 */
	public function setAppID($appID) {
		$this->appID = $appID;
		return $this;
	}

	protected $appSecret;
	
	public function getAppSecret() {
		return $this->appSecret;
	}

	/**
	 * 
	 * @param type $appSecret
	 * @return \socialfeed\config\providers\Facebook
	 */
	public function setAppSecret($appSecret) {
		$this->appSecret = $appSecret;
		return $this;
	}

}
