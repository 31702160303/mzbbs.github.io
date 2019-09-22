<?php
include ("./conn/conn.php");
if(!empty($_GET)){
	$xh = $_SERVER["HTTP_USER_AGENT"];
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
	$clientip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
	$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
} else {
	$clientip = $_SERVER['REMOTE_ADDR'];
}

if ($clientip == '127.0.0.1' or $clientip == '172.26.32.138' or $clientip == '172.26.32.135' or $clientip == '172.26.32.134') {
$no = $_GET['no'];
$no=trim($no,'[]');
$no=str_replace('{"no":"', '', $no);
$no=str_replace('"}', '', $no);
$no=str_replace('or', '', $no);
$no=str_replace('>', '', $no);
$no=str_replace('<', '', $no);
$updata_sql = 'update LostAndFound set dele = 1 where id in('.$no.')';
$result=mysqli_query($link,$updata_sql);
if ($result>0) {
                    echo '{"status":true,"data":"删除成功"}';
                    exit();
				}else{
                    echo '{"status":false,"data":"删除失败！！！"}';
                    exit();
                }
			
}
else{
//	echo '<script language="JavaScript">alert("又不能删？");alert("当然不是");alert("因为你不是正确的人");window.location.href="index.php";</script>';
	  echo '{"status":false,"data":"不能删除,因为你不是正确的人'.$clientip.'"}';
	  
}

}

?>
