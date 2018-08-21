<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once(ROOT.DS.'lib'.DS.'init.php');

//Session::setFlash('Test flash sessage.');
session_start();

App::run( $_SERVER['REQUEST_URI']);
//$test = App::$db->query('SELECT * FROM pages');
//echo "<pre class='preText'><code>";
//print_r($test);
//echo "</pre></code>";