<?php
include ("../conn/conn.php");
@$Version = $_GET['Version'];
//$Version = 1;
//var_dump($Version);
$zl_sql = "select * from tb_updata";
$zl_result = mysqli_query($link, $zl_sql);
$zl_info = mysqli_fetch_array($zl_result);
//echo$zl_info['Version'];
if ($Version == $zl_info['Version']) {
	  echo '{"status":true,"data":"版本号正常！"}';
	
	
} else {
	
	$se_sql = "select * from tb_updata";
$se_result = mysqli_query($link, $zl_sql);
//var_dump($zl_info);
	echo '{"status":false , "data":' . json_encode(mysqli_fetch_all($se_result, MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE) . '}';
	  
}
?>