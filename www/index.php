<?php

// Move config path to right above web root
define('CRAFT_CONFIG_PATH', realpath(dirname(__FILE__) . "/../config").'/');

// Move plugins path to right above web root
define('CRAFT_PLUGINS_PATH', realpath(dirname(__FILE__) . "/../plugins").'/');

// Move templates path to right above web root
define('CRAFT_TEMPLATES_PATH', realpath(dirname(__FILE__) . "/../templates").'/');

// Path to your craft/ folder
$craftPath = '../core';

// Do not edit below this line
$path = rtrim($craftPath, '/').'/app/index.php';

if (!is_file($path))
{
	exit('Could not find your craft/ folder. Please ensure that <strong><code>$craftPath</code></strong> is set correctly in '.__FILE__);
}

require_once $path;
