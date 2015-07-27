<?php
if (!defined('FUNCTION_CLOUD')){
	exit('Access denied');
}
/*
 *********************
 Function Cloud
 Excel 云函数平台
 By：Flyrainning
 *********************

 取得变量 value('id,name,date……');  然后就可以使用变量 $id  $name  $date  分别对应Excel传过来的第1,2,3 ... 个参数
 正常输出 send('some result');  调用后停止执行
 错误输出 error('some message');  调用后停止执行
 可用变量：
 	$_value;  包含所有上传参数的数组
*/

// Your CODE Here
//取得变量
value('v1,v2');
//进行计算


$result=$v1+$v2;





//输出结果到Excel
send($result);
?>
