<?php
		include '../conn/conn.php';
		   if(!empty($_POST)){
@$id=$_POST['id'];
@$sno=$_POST['sno'];
@$se_sql = "select sno from LostAndFound where id=$id";
		@$se_result = mysqli_query(@$link, $se_sql);
		@$se_rows = mysqli_fetch_array(@$se_result);
		@$tmp_sno = @$se_rows['sno'];

			if (@$tmp_sno == @$sno) {
//$sql="delete from swz where id = ".$id;
$sql = "update LostAndFound set dele = 1 where id = ".$id;

$result=mysqli_query($link, $sql);
if($result){
		    echo '{"status":true,"data":"删除成功！下拉刷新看看吧！"}';
	exit;

}
else{
		    echo '{"status":false,"data":"删除失败！"}';
	exit;

}
			}
		else{
		    echo '{"status":false,"data":"学号错误！"}';
	exit;

}
		
		   }


?>
