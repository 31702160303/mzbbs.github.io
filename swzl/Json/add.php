<?php
    include '../conn/conn.php';
	//if(isset($_POST['username'])){
    if(!empty($_POST)){
		$IsFound = $_POST['IsFound'];
		$room = $_POST['room'];
		$sth = $_POST['sth'];
		$sno = $_POST['sno'];
		$sname = $_POST['sname'];
		$Contact = $_POST['Contact'];
		$time = gmdate("y-m-d", time() + 8 * 3600);
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$clientip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
		$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

//		if (empty($username)){
//          echo '{"status":false,"data":"没有填写用户名，请重新输入！"}';
//          exit();
//      }
//      if (empty($password)){
//          echo '{"status":false,"data":"没有填写密码，请重新输入！"}';
//          exit();
//      }
//      if (empty($password2)){
//          echo '{"status":false,"data":"没有填写确认密码，请重新输入！"}';
//          exit();
//      }
		$sno_sql = "SELECT sname,bj FROM NameList WHERE sno =$sno";

		@$result = mysqli_query(@$link, $sno_sql);
		@$rows = mysqli_fetch_array(@$result);
		if (@$rows) {
			if (@$rows['bj'] == 1) {
				  echo '{"status":false,"data":"黑名单用户"}';
            exit();
			
			}
			@$tmp_sname = @$rows['sname'];

			if (@$tmp_sname == @$sname) {

				@$add_sql = "insert into LostAndFound(room,time,sth,ip,IsFound,Contact,sno,dele) values('" . $room . "','" . $time . "','" . $sth . "','" . $ip . "','" . $IsFound . "','" . $Contact . "','" . $sno . "','0')";
				@$add_result = mysqli_query(@$link, @$add_sql);

				if (@$add_result) {
                    echo '{"status":true,"data":"发布成功！下拉刷新一下吧！！"}';
						
//					echo '<script language="JavaScript">history.back(0);</script>';
					exit ;
				} else {
 					 echo '{"status":false,"data":"发布失败！"}';
                    exit();
//					echo '<script language="JavaScript">alert("发布失败！");history.back(); </script>';
				}
			} else {
			  echo '{"status":false,"data":"学号或姓名不正确，请重新输入"}';
//				echo '<script language="JavaScript">alert("学号或姓名不正确");window.history.back();</script>';

				exit ;
			}
		} else {
			@$sql3 = "insert into LostAndFound(room,time,sth,ip,IsFound,Contact,sno,timem,dele)
values('" . $room . "','" . $time . "','" . $sth . "','" . $ip . "','1','" . $Contact . "','" . $sno . "','" . $timem . "','3')";
			@$result = mysqli_query(@$link, @$sql3);
//			echo '<script language="JavaScript">alert("学号或姓名不正确");window.history.back();</script>';
			  echo '{"status":false,"data":"学号或姓名不正确，请重新输入"}';
			exit ;
		}
//		$sql = "select * from tb_users where username='$username'";
//		$result = mysqli_query($database,$sql);
//		$nums = mysqli_num_rows($result);
//		if($nums > 0){
//          echo '{"status":false,"data":"已有相同的用户名，请重新输入！"}';
//          exit();
//		}else{
//			if ($password == $password2) {
//				$sql2 ="insert into tb_users (username,password) values ('$username','".md5($password)."')";
//				$result = mysqli_query($database,$sql2);
//				if ($result) {
//                  echo '{"status":true,"data":"添加用户成功！"}';
//                  exit();
//				}else{
//                  echo '{"status":false,"data":"添加用户失败！"}';
//                  exit();
//              }
//			}else{
//              echo '{"status":false,"data":"两次密码不一致，请重新输入"}';
//			}
//		}
	}

 ?>