<?php
/**
 * 后台入口
 */
if(version_compare(PHP_VERSION,'5.3.0','<')) die('require PHP > 5.3.0');

define("APP_PATH",'Application/');

define('BIND_MODULE','Admin');//绑定模块

define("APP_DEBUG",true);

require 'ThinkPHP/ThinkPHP.php';