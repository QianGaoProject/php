<?php

/**
 * Auto load the class files
 * @param string $class_name
 */
function __autoload($class_name) {
  require_once 'includes/classes/' . strtolower($class_name) . '.php';
}
 
// include required files
require_once 'includes/functions.php';
