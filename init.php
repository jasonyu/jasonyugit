<?php
header('Content-Type: text/html; charset=utf-8');
//公共文件
/* Correct Apache charset */

ob_start();

include(dirname(__FILE__).'/config/config.inc.php');
$cookie = new Cookie(_COOKIE_IV_);

/* Smarty */
include($currentDir.'/smarty.config.inc.php');

$smarty->assign(array(
	'base_dir' => __GW_BASE_URI__,
	'tpl_dir' => _GW_THEME_DIR_,
	'img_url' => __GW_IMG__,
	'come_from' => 'http://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').htmlentities($_SERVER['REQUEST_URI']),
	'gwS' => $gwS,
	'logged' => $cookie->logged,
	'mod' => $mod,
	//'language' => $_SERVER["HTTP_ACCEPT_LANGUAGE"]
)
);

?>