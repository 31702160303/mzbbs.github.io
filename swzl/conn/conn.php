<?php
    error_reporting(0);
// $link=mysqli_connect("127.0.0.1","root","1231312312","swzl") or die("数据库服务器连接错误");//连接到MySQL服务器
//   $link=mysqli_connect("rm-wz95y5m9bw649q2qtdo.mysql.rds.aliyuncs.com","swzl","swzl1722632137","swzl") or die("数据库服务器连接错误(非上课时间服务器可能处于维护状态)".mysqli_error());//连接到MySQL服务器

$link=mysqli_connect("rm-wz95y5m9bw649q2qtdo.mysql.rds.aliyuncs.com","test","","swzl_test") or die("数据库服务器连接错误(非上课时间服务器可能处于维护状态)".mysqli_error());//连接到MySQL服务器

mysqli_query($link,"set names utf8");//设置编码格式
?>
