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
\Claromentis\Socialfeed\ClassLoader::register('Facebook', realpath(__DIR__ . '/lib/facebook-php-sdk-v4-4.0-dev/src'));

// load the custom configuration for this module
ClaApplication::LoadConfig('socialfeed');

