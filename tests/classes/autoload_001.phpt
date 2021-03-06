--TEST--
ZE2 Autoload and class_exists
--SKIPIF--
<?php 
	if (class_exists('autoload_root', false)) die('skip Autoload test classes exist already');
?>
--FILE--
<?php

function __autoload($class_name)
{
	require_once(dirname(__FILE__) . '/' . $class_name . '.p5c');
	echo __FUNCTION__ . '(' . $class_name . ")\n";
}

var_dump(class_exists('autoload_root'));

?>
===DONE===
--EXPECT--
__autoload(autoload_root)
bool(true)
===DONE===
