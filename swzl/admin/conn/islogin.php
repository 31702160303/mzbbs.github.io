	<?php
if(!session_id())  session_start();
if(!isset($_SESSION['jsjgcxusername'])||$_SESSION['islogin']==FALSE)
{
	echo '<script language="JavaScript">

	window.location.href="../login.html";</script>';
	exit;
//	alert("请先登录");  
	
}
?> 