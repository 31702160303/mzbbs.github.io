
<?php
// $link=mysqli_connect("172.26.32.137","test","","swzl") or die("数据库服务器连接错误");//连接到MySQL服务器
   $link=mysqli_connect("rm-wz95y5m9bw649q2qtdo.mysql.rds.aliyuncs.com","test","","swzl_test") or die("数据库服务器连接错误(可能是这台服务器没通外网)");//连接到MySQL服务器

    mysqli_query($link,"set names utf8");//设置编码格式
?>
