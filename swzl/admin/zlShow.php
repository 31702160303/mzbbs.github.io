<?php
include ("../conn/conn.php");
$zl_sql = "select id,room,time,sth,Contact from LostAndFound where IsFound=0 and dele = 0 order  by id desc ";
$zl_result = mysqli_query($link, $zl_sql);
$zl_info = mysqli_num_rows($zl_result);
if ($zl_info > 0) {
	echo '{"status":true , "data":' . json_encode(mysqli_fetch_all($zl_result, MYSQLI_ASSOC), JSON_UNESCAPED_UNICODE) . '}';

} else {
	echo "本站暂无招领启事!";
}
?>
<?php
 //文件名字
 $filename = "showip.txt";
$iptime = gmdate("Y-m-d H:i:s",time()+8*3600);
$xh = $_SERVER["HTTP_USER_AGENT"] ;
  if (isset($_SERVER['HTTP_CLIENT_IP']))
  {
  $clientip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif (isset($_SERVER['HTTP_X_FORWARD_FOR']))
  {
  $clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
  }else
  {
  $clientip = $_SERVER['REMOTE_ADDR'];
  }
  //打开文件（文件不存在自动建立）
  if (!$fp = fopen($filename, "a+"))
  {
   echo "不能打开文件$";
  exit;
  }
 //写入的时候还判断是否已经有重复数据
 while(!feof($fp))
 {
  $line = fgets($fp);
  if($line == ($clientip."/"))
  {  
   exit;  //有重复数据就退出；
  }
 }
 // 写入文件
  if(!fwrite($fp,$iptime."----".$clientip."----".$xh."
"))
  {
   echo "不能写入到文件$filename" ;
  exit;
  }
  //已经完成写入文件
  fclose($fp);
 ?>