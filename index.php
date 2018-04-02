<?php
//项目入口文件

if (version_compare(PHP_VERSION,'5.3.0','<')) die('require PHP > 5.3.0');

define('APP_PATH','Application/');//定义应用程序目录

define('App_DEBUG',true);//开启调试模式，实际部署时应关闭

require 'ThinkPHP/ThinkPHP.php';//引入框架