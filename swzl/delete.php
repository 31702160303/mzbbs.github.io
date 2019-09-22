<meta charset="UTF-8"/>
<?php
echo'<script type="text/javascript">alert("建设中...如需急用，可在手机APP中删除");history.back(-1);</script>';
	die;
	?>
<meta charset="UTF-8"/>
<form action="" method="post">
	<input type="hidden" name="" id="" value="<?php $id=$_GET['id'];?>" />
	<input type="text" name="sno" id="sno"  />
	<input type="submit" name="Submit" value="删除"/>
</form>
<?php
//文件名字
	if (isset($_POST["Submit"])) {
$xh = $_SERVER["HTTP_USER_AGENT"];
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
	$clientip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
	$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
} else {
	$clientip = $_SERVER['REMOTE_ADDR'];
}
include ("conn/conn.php");
$id=$_POST['id'];
$sno = $_POST['sno'];
$select = 'SELECT sno FROM lostandfound WHERE id =$id';
//$result_se=mysqli_query($link, $select);
//$sql="delete from swz where id = ".$id;
var_dump(mysqli_fetch_array(mysqli_query($link, $select))['sno']);

if(mysqli_fetch_assoc(mysqli_query($link, $select))['sno']==$sno)

{
	
$sql = "update LostAndFound set dele = 1 where id = ".$id;
	
$result=mysqli_query($link, $sql);
if($result){
		echo'<script type="text/javascript">;window.location.href="adminindex.php";</script>';
	exit;

}
else{
		echo'<script type="text/javascript">alert("删除失败");history.back(-1);</script>';
	exit;

}


	}else{
		var_dump(mysqli_fetch_array(mysqli_query($link, $select))['sno']);
	exit;

}
	}
?>
