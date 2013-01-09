<?php
if(function_exists('saeAutoLoader')){
	require dirname(__FILE__).'/sae.php';
	define('IO_TRUE_NAME','sae');
}elseif(isset($_SERVER['HTTP_BAE_ENV_APPID'])){
	require dirname(__FILE__).'/bae.php';
	define('IO_TRUE_NAME','bae');
}else{	
	define('IS_SAE',false);
	define('IS_BAE',false);
	define('IS_ACE',false);
	define('IS_CLOUD',false);
	$runtime = defined('MODE_NAME')?'~'.strtolower(MODE_NAME).'_runtime.php':'~runtime.php';
	defined('RUNTIME_FILE') or define('RUNTIME_FILE',RUNTIME_PATH.$runtime);
	if(!APP_DEBUG && is_file(RUNTIME_FILE)) {
	    // 部署模式直接载入运行缓存
	    require RUNTIME_FILE;
	}else{
	    // 加载运行时文件
	    require THINK_PATH.'Common/runtime.php';
	}	
	exit();
}
