<?php
// 应用配置，所有模块调用之前都会首先加载公共配置文件
return array(
	//'配置项'=>'配置值'
	//数据库配置
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'kw',
	'DB_USER' => 'root',
	'DB_PWD' => 'root',
	'DB_PORT' => '3306',
	'DB_PREFIX' => '',
	'DB_CHARSET' => 'utf8',
	//URL的模式
	'URL_MODEL' => 1,
	 // 'DEFAULT_MODULE' => 'Admin',
	 // 'DEFAULT_CONTROLLER' => 'Index',
	 // 'DEFAULT_ACTION' => 'index',
	 'URL_ROUTER_ON' => true,
);