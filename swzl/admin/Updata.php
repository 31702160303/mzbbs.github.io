<?php
	include './conn/conn.php';
if (!empty($_POST)) {
		
	$xh = $_SERVER["HTTP_USER_AGENT"];
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
	$clientip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
	$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
} else {
	$clientip = $_SERVER['REMOTE_ADDR'];
}

// if ($clientip == '127.0.0.1' or $clientip == '172.26.32.138' or $clientip == '172.26.32.135' or $clientip == '172.26.32.134') {
		$insert_sql = "UPDATE LostAndFound SET " .$_POST['field']." = '".$_POST['value']."' , modifyTime = '". gmdate("Y-m-d H:i:s", time() + 8 * 3600)."'  where id = ".$_POST['id'];
		$result = mysqli_query($link, $insert_sql);
//var_dump($insert_sql);
		if ($result) {
			  echo '{"status":true,"data":"修改成功"}';
		} else {
			 echo '{"status":false,"data":"修改失败！！！"}';
		}
	}
// else{
// //	echo '<script language="JavaScript">alert("又不能删？");alert("当然不是");alert("因为你不是正确的人");window.location.href="index.php";</script>';
// 	  echo '{"status":false,"data":"不能修改,因为你不是正确的人'.$clientip.'"}';
// 	}
  
// }
?>