<?php

//包含标志
define('FUNCTION_CLOUD',TRUE);

//set
define('CHROOT_Enable',false);

if (isset($_POST["key"])){//取得API
	$_key_uri = $_POST["key"];
}else if (isset($_GET["key"])){
	$_key_uri = $_GET["key"];
}else{
	error('没有选择公式，第一个参数为要使用的公式名称');
}


$_key_uri=dirname(__FILE__).'/functions/'.strtr($_key_uri,array(
	'.'=>'/',
	'\\'=>'/',
	'-'=>'/',
	'_'=>'/',
	'。'=>'/',
	' '=>'/',
)).'.php';
/*
error_reporting(E_ALL);
	$a=dirname($_key_uri).'/';
	echo $a;
	
	echo 'b';
	echo getcwd();
	echo chroot($a)?'1':'2';
	echo getcwd();
	echo 'a';
phpinfo();
die();
*/
if (file_exists($_key_uri)) {
	if (CHROOT_Enable && !chroot(dirname($_key_uri))){
		error('系统错误，请稍后再试');
	}
	
	
	
	if (isset($_POST['value'])){
		$_value=json_decode($_POST['value'],true);
	}else{
		$_value=array();
	}

	require $_key_uri;
	
}else{
	error('没有找到公式，请确认公式名称是否正确');
}
send('');


//************************************************Functions

function error($msg){
	echo '#cloud_错误: '.$msg;
	die();
}

function send($msg){
	echo $msg;
	die();
}
function value($v){
	$arr=strtoarray($v);
	$n=0;
	global $_value;
	foreach($arr as $v){
		$k=trim($v);
		global ${$k};
		${$k}=(isset($_value[$n]))?$_value[$n]:'';
		$n++;	
	}
}


function arraytostr($arr,$parm=','){
	$arr=is_array($arr)?implode($parm, $arr):$arr;
	return trim($arr,$parm);

}
function strtoarray($str,$parm=','){
	if (is_string($str) && trim($str)==''){
		$str=array();
	}else{
		$str=is_array($str)?$str:explode($parm,trim($str,$parm));
	}
	return $str;

}
function utf8($s){
	return iconv("gbk", "UTF-8", $s);
}
function gbk($s){
	return iconv("UTF-8","gbk" ,$s);
}
function jsontoarr($json){
	return json_decode($json,true);
}
function arrtojson($arr){
	return json_encode($arr);
}
function makedef(&$k,$v){
	return (!empty($k))?$k:$v;
}

?>
