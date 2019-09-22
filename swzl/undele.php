 <meta charset="UTF-8"/>

<?php
//文件名字

$xh = $_SERVER["HTTP_USER_AGENT"];
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
	$clientip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
	$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
} else {
	$clientip = $_SERVER['REMOTE_ADDR'];
}

if ($clientip == '127.0.0.1' or $clientip == '172.26.32.138' or $clientip == '172.26.32.135' or $clientip == '172.26.32.134') {
		include ("conn/conn.php");
$id=$_GET['id'];


//$sql="delete from swz where id = ".$id;
$sql = "update LostAndFound set dele = 0 where id = ".$id;

$result=mysqli_query($link, $sql);
if($result){
			echo'<script type="text/javascript">;window.location.href="adminindex.php";</script>';
	exit;

}
else{
		echo'<script type="text/javascript">alert("还原失败");history.back(-1);</script>';
	exit;

}

}else{
	echo '<script language="JavaScript">alert("非法用户");window.location.href="index.php";</script>';
	
}

?>
