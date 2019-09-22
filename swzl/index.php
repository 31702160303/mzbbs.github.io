<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>计算机工程系失物招领</title>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<link rel="stylesheet" href="css/mui.min.css">
		<script src="js/mui.min.js" ></script>
		<script src="js/add.js" type="text/javascript"></script>
		<script  language="javascript"></script>
		<script src="js/jquery.min.js"></script>
		<script>$(function() {
	// 调用 公告滚动函数
	setInterval("noticeUp('.notice ul','-35px',2000)", 4000);
});</script>

	</head>
	<body>
		<?php
		include ("conn/conn.php");
		?>
		<!--头部部分开始-->
			<header>
			<div class="header">
				<div>
					<!--<img src="http://www.mmvtc.cn/templet/default/images/logo.png"/style="width: 15%;" >-->
					<img src="http://www.mmvtc.cn/templet/default/images/logo.png"/ >

				</div>
				<div style="margin-top: 10px;" >
					<img src="images/Title.png"/>
				
				</div>
				
			</div>
		</header>
		<!--头部部分结束-->
		<main calss="main">
			<!--主体循环开始-->

			<div class="mui-content" style="max-width: 1200px; min-height: 470px; margin: auto; background: url(images/1.png )  0 100% opacity: 0;">
				<div class="notice">
					<ul>
						<?php  $gg_sql = "select * from tb_Announ where IsOpen=1  order  by id desc ";
						 $gg_result = mysqli_query($link, $gg_sql);
						while ( $gg_info = mysqli_fetch_array( $gg_result)) {
							echo "<li> " .  $gg_info['text'] . "</li>";
						}
						?>
					</ul>
				</div>
				<div style="padding: 10px 10px;">
					<div id="segmentedControl" class="mui-segmented-control">
						<a class="mui-control-item mui-active" href="#item1">
							寻物启事
						</a>
						<a class="mui-control-item" href="#item2">
							招领启事
						</a>
						<a class="mui-control-item" href="#item3">
							发布启事
						</a>
					</div>
				</div>
				<div>
					<div id="item1" class="mui-control-content mui-active" style="padding: 10px;">

						<div id="scroll" style="overflow: auto;">
							<ul>
								<li class='top_xunhuan' >
									<div class="top_left" >
										<p>
											地点
										</p>
										<p>
											物品
										</p>
										<p>
											联系方式
										</p>
										<p>
											时间
										</p>

									</div>
								</li>

								<?php  $Found_sql = "select id,room,sth,Contact,time from LostAndFound where found=1  and dele = 0 and DATE_SUB(CURDATE(), INTERVAL 15 DAY) <= time order  by id desc ";
	 $Found_result = mysqli_query( $link,  $Found_sql);
	 $Found_info = mysqli_num_rows( $Found_result);
	if ( $Found_info == false) {
		echo "本站暂未收录寻物启事!";
	} else {
		while ( $Found_info = mysqli_fetch_array( $Found_result)) {
			echo " <li class='li_xunhuan' >
<div>
<p>" .  $Found_info['room'] . "</p>
<p>" .  $Found_info['sth'] . "</p>
<p>" .  $Found_info['Contact'] . "</p>
<p>" .  date('Y-m-d', $Found_info['time']) . "</p>
<a href='delete.php?id=".$Found_info['id'] . "'>删</a>
</div>
</li>";
		}
	}
								?>
							</ul>
						</div>
					</div>
					<div id="item2" class="mui-control-content" style="padding: 10px;">

						<ul>
							<li class='top_xunhuan' >
								<div class="top_left" >
									<p>
										地点
									</p>
									<p>
										物品
									</p>
									<p>
										联系方式
									</p>
									<p>
										时间
									</p>

								</div>
							</li>
							<?php  $zl_sql =  "select id,room,sth,Contact,time from LostAndFound where found=0 and dele = 0 and DATE_SUB(CURDATE(), INTERVAL 15 DAY) <= time order  by id desc ";
								 $zl_result = mysqli_query( $link,  $zl_sql);
								 $zl_info = mysqli_num_rows( $zl_result);
								if ( $zl_info == false) {
									echo "本站暂无招领启事!";
								} else {
									while ( $zl_info = mysqli_fetch_array( $zl_result)) {
										echo " <li class='li_xunhuan' >
<div>
<p>" .  $zl_info['room'] . "</p>
<p>" .  $zl_info['sth'] . "</p>
<p>" .  $zl_info['Contact'] . "</p>
<p>" .  date('Y-m-d', $zl_info['time']) . "</p><a href='#'>删</a></div>
</li>";
									}
								}
							?>
						</ul>
					</div>
					<div id="item3" class="mui-control-content" style="padding: 10px;">
						<ul class="">
							<li class="MsgInp">
								<form action="" name="form1" id="login_form" method="post" onSubmit="return chkinput(this)" style="margin: auto;">
									<div class="Lab_left">
										<p >
											选择类型：
										</p>
										<p >
											选择教室：
										</p>
										<p>
											物品：
										</p>
										<p>
											联系方式：
										</p>
										<p>
											学号：
										</p>
										<p>
											姓名：
										</p>
									</div>
									<div class="Lab_right">
										<p style="font-size: 20px; height: 40px; line-height: 40px;">
											<input style="height: 20px;" name="IsFound" type="radio" value="1" />
											寻物
											<input style="height: 20px;" name="IsFound" type="radio" value="0" />
											招领
										</p>

										<select name="room">
											<option value="">选择教室</option>
											<option value="6-104">6-104</option>
											<option value="6-201">6-201</option>
											<option value="6-202">6-202</option>
											<option value="6-203">6-203</option>
											<option value="6-205">6-205</option>
											<option value="6-206">6-206</option>
											<option value="6-302">6-302</option>
											<option value="6-303">6-303</option>
											<option value="6-304">6-304</option>
											<option value="6-305">6-305</option>
											<option value="6-306">6-306</option>
											<option value="6-402">6-402</option>
											<option value="6-403">6-403</option>
										</select>

										<input type="text" name="sth"  placeholder="简洁描述，10字以内" autocomplete="off" />

										<input type="text" name="Contact"  placeholder="您的联系方式" autocomplete="off"  />

										<input type="text" name="sno"  placeholder="是11位数的"  autocomplete="off" />

										<input type="text" name="sname"  placeholder="" autocomplete="off"  />
										<i>默认时间为发布时间</i>
										<p></p>

										<input type="submit" name="Submit" value="发布启事" />
									</div>
								</form>
							</li>

						</ul>
					</div>
				</div>

			</div>

		</main>
		<!--主体循环结束-->
		<br />
		<br />
		<br />
		<hr />
		<!--尾部循环开始-->
		<footer >
			<div class="friend_link" >

				<br />
				<br />
				快速链接
				<br />
				<br />

				<?php  $Fr_link_sql = "select * from FriendLink where IsOpen=1  order  by id desc ";
	 $Fr_link_result = mysqli_query( $link,  $Fr_link_sql);

	while ( $Fr_link_info = mysqli_fetch_array( $Fr_link_result)) {
		echo "<a href='" .  $Fr_link_info['Url'] . "'> " .  $Fr_link_info['text'] . "</a>";
	}
				?>
			</div>
			<div class="friend_link">
				<br />
				<br />
				<li>
					<img src="images/app.png"/>
					<p>
						app下载
					</p>
				</li>
				<!--<li>
					<img src="images/sc.jpg"/>
					<p>
						学院微信
					</p>
				</li>-->
				<li>
					<img src="images/wx_jsj.jpg"/>
					<p>
						系部微信
					</p>
				</li>
				<li>
					<img src="images/csh.jpg"/>
					<p>
						联系作者
					</p>
				</li>
				
			</div>
		</footer>
		<br />
		<div style="text-align: center;">
			&copy;计算机工程系实训室管理中心
		</div>
		<!--尾部循环结束-->

	</body>
	<?php //session_start();
		include_once ("conn/conn.php");
		//		$timem = $_SERVER["REQUEST_TIME"];

		$time = gmdate("y-m-d", time() + 8 * 3600);
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$clientip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
			$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		if (isset($_POST["Submit"])) {
			$room = $_POST['room'];
			$sth = $_POST['sth'];
			$sno = $_POST['sno'];
			$sname = $_POST['sname'];
			$Contact = $_POST['Contact'];
			$IsFound = $_POST['IsFound'];
			 $sno_sql = "SELECT sname,bj FROM NameList WHERE sno =$sno";

			 $result = mysqli_query( $link, $sno_sql);
			 $rows = mysqli_fetch_array( $result);
			if ( $rows) {
				if ( $rows['bj'] == 1) {
					echo '<script language="JavaScript">alert("黑名单用户");window.history.back();</script>';
					exit ;
				}
				 $tmp_sname =  $rows['sname'];

				if ( $tmp_sname ==  $sname) {

					 $add_sql = "insert into LostAndFound(room,time,sth,ip,IsFound,Contact,sno,dele) values('" . $room . "','" . $time . "','" . $sth . "','" . $ip . "','" . $IsFound . "','" . $Contact . "','" . $sno . "','0')";
					 $add_result = mysqli_query( $link,  $add_sql);

					if ( $add_result) {
						echo '<script language="JavaScript">history.back(0);</script>';
						exit ;
					} else {

						echo '<script language="JavaScript">alert("发布失败！");history.back(); </script>';
					}
				} else {

					echo '<script language="JavaScript">alert("学号或姓名不正确");window.history.back();</script>';

					exit ;
				}
			} else {
				 $sql3 = "insert into LostAndFound(room,time,sth,ip,IsFound,Contact,sno,timem,dele)
values('" . $room . "','" . $time . "','" . $sth . "','" . $ip . "','1','" . $Contact . "','" . $sno . "','" . $timem . "','3')";
				 $result = mysqli_query( $link,  $sql3);
				echo '<script language="JavaScript">alert("学号或姓名不正确");window.history.back();</script>';
				exit ;
			}

		}
	?>
	<?php
	//文件名字
	$filename = "ip.txt";
	$xh = $_SERVER["HTTP_USER_AGENT"] ;
	$iptime = gmdate("Y-m-d H:i:s", time() + 8 * 3600);
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$clientip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
		$clientip = $_SERVER['HTTP_X_FORWARD_FOR'];
	} else {
		$clientip = $_SERVER['REMOTE_ADDR'];
	}
	//打开文件（文件不存在自动建立）
	if (!$fp = fopen($filename, "a+")) {
		echo "不能打开文件$";
		exit ;
	}
	//写入的时候还判断是否已经有重复数据
	while (!feof($fp)) {
		$line = fgets($fp);
		if ($line == ($clientip . "/")) {
			exit ;
			//有重复数据就退出；
		}
	}
	// 写入文件
	if (!fwrite($fp, $iptime . "----" . $clientip . "----" . $xh . "
")) {
		echo "不能写入到文件$filename";
		exit ;
	}
	//已经完成写入文件
	fclose($fp);
	?>
</html>
