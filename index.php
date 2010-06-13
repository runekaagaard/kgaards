<?php
// Log errors.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Constants.
define('KG_PATH', realpath(dirname(__FILE__)));

// Includes.
require(KG_PATH . '/lib/FrontController.php');

// Display html.
echo FrontController::_()->parseRequest();