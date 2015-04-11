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
 * Configuration provider for integrating with Facebook
 *
 * @author Nathan Crause
 */
class Facebook implements Provider {

	public function getName() {
		return 'Facebook';
	}

	public function getProtocol() {
		return 'OAuth';
	}
	
	public function getApiVersion() {
		return '2.2';
	}

	public function connect() {
		return new \Claromentis\Socialfeed\Data\Provider\Facebook($this);
	}
	
	protected $appID;
	
	public function getAppID() {
		return $this->appID;
	}

	/**
	 * 
	 * @param type $appID
	 * @return \Claromentis\Socialfeed\Configuration\Provider\Facebook
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
	 * @return \Claromentis\Socialfeed\Configuration\Provider\Facebook
	 */
	public function setAppSecret($appSecret) {
		$this->appSecret = $appSecret;
		return $this;
	}
	
//	protected $accessToken;
//	
//	public function getAccessToken() {
//		return $this->accessToken;
//	}
//
//	/**
//	 * 
//	 * @param string $accessToken
//	 * @return \Claromentis\Socialfeed\Configuration\Provider\Facebook
//	 */
//	public function setAccessToken($accessToken) {
//		$this->accessToken = $accessToken;
//		return $this;
//	}

	protected $resource = 'Claromentis';
	
	public function getResource() {
		return $this->resource;
	}

	/**
	 * 
	 * @param string $resource
	 * @return \Claromentis\Socialfeed\Configuration\Provider\Facebook
	 */
	public function setResource($resource) {
		$this->resource = $resource;
		return $this;
	}

}
