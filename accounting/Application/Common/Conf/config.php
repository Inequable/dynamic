<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' 		=> true, // 显示页面Trace跟踪信息
	'DEBUG_MODE' 			=> true, //开启错误调试

	'DEFAULT_MODULE'        => 'Home',//默认加载的模型
	'DEFAULT_ACTION'        => 'login',//加载的login方法，默认是加载index方法
	// 'MODULE_ALLOW_LIST'		=> array('Home','Admin'),//定义可供访问的分组列表

	// 'DB_DSN' => 'mysql://root:2015329122@localhost:3306/accounting#utf8'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'http://mysql-dyname.7e14.starter-us-west-2.openshiftapps.com', // 服务器地址
	'DB_NAME'   => 'dyname', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '2015329122', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'acc_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE,
    'TMPL_ENGINE_TYPE'      => 'Smarty',     // 默认模板引擎是think
 //    'TMPL_ENGINE_CONFIG'	=> array(
	// 	'left_delimiter'	=> '<@@',
	// 	'right_delimiter'	=> '@@>',
	// ),//samrty配置
	// 
	'TMPL_ACTION_ERROR' => 'Tpl/dispatch_jump',//自定义模板,错误跳转模板
	'TMPL_ACTION_SUCCESS' => 'Tpl/dispatch_jump',//自定义模板,成功跳转模板
// 需要在httpd.conf开启mod_rewrite模块
	'URL_MODEL'             =>  2, //URL访问模式,可选参数0、1、2、3,代表以下四种模式
	'URL_PATHINFO_DEPR' 	=> '-',//pathinfo模式下，各个参数使用-连接

	'DEFAULT_FILTER'		=> 'trim,htmlspecialchars',//修改默认过滤函数
);
