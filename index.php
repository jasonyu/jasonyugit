<?php
//$gwS = md5($_GET['s']);
$gwS = $_GET['s'] ? $_GET['s']:"商城大全";

$patterns = array ('/^http\:\/\//',
                   '/^\//');
$replace = array ('', '');
$gwS = preg_replace($patterns,$replace,$gwS);
if($gwS)
{
	//echo $gwS;exit;
	include "config/memcache.inc.php";
	$gwSV = $gwmem->get($gwS);
	if($gwSV) parse_str($gwSV);
	//else header ( 'Location: /' );
	else exit;
	if($mod)
	{
		if(file_exists("modules/".$mod.".php"))
		{
			include(dirname(__FILE__).'/init.php');
			//echo $gwSV;
			include "modules/".$mod.".php";exit;
		}
	}
	//echo $gwS;exit;
}


include(dirname(__FILE__).'/init.php');

$smarty->display('header.tpl');
$smarty->display('tools.tpl');

$smarty->display('index.tpl');
$smarty->display('footer.tpl');

?>