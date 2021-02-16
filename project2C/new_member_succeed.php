<?php
	session_start();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>NIKE --LOGIN--</title>  
	</head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="popup2.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login1.css">
	
	<body>
		<?php
		//抓取新會員輸入資料
		$Name = isset($_POST['Name'])?$_POST['Name']:NULL;
		$Account = isset($_POST['Account'])?$_POST['Account']:NULL;
		$Sex = isset($_POST['Sex'])?$_POST['Sex']:NULL;
		$Email = isset($_POST['Email'])?$_POST['Email']:NULL;
		$PassWord = isset($_POST['PassWord'])?$_POST['PassWord']:NULL;
		$PassWord2 = isset($_POST['PassWord2'])?$_POST['PassWord2']:NULL;
		$Birthday = isset($_POST['Birthday'])?$_POST['Birthday']:NULL;
		$Phone = isset($_POST['Phone'])?$_POST['Phone']:NULL;
		
		//抓取資料庫
		header("Content-Type: text/html; charset=utf-8");
		include("ConnMysqlObj.php");
		?>
		
		<nav class="zone color sticky main-nav">
			<div class="nike1 form">  <a href="center.php"><img class="nike2 form2" src="nike.jpeg" title="首頁"></a></div>
			<!-- 從這裡開始，就是菜單按鈕 -->
			<div class="menu">
				<input type="button" id="check2">
				<label for="check2" class="checkbtn">
					<i class="fas fa-bars" title="捷徑"></i>
				</label>
			</div>

			<?php
			if($_SESSION["login_person"] == "")
			{
				$member_show = "會員登入";
			}
			else
			{
			$member_show = $_SESSION["login_person"]."，你好";
			}
			?>

			<!-- 從這裡開始，就是菜單內容物的部分 -->
			<div id="myModal2" class="modal2">
				<!-- Modal content -->
				<div class="modal-content2">
					<div class="modal-header2">
						<span class="close2">&times;</span>
						<div class=" form2"><a href="login.php"><img class="member2 form2" src="555.png" title="<?php echo $member_show ?>"></a></div>
						<div class=" form2">  <a href="shopping_cart.php"><img class="cart2 form2" src="554.jpg" title="購物車"></a></div>
						<div class="form2 sign_out_logo">
							<input type="button" id="check2">
							<label for="check2" class="sign_out">
								<a href="logout.php"><i style="font-size:50px" class="fa" title="會員登出">&#xf08b;</i></a>
							</label>
							</div>
					</div>
				</div>
			</div>
		</nav>
		
		<div class = "white"></div>
		
		<?php
		if(($Name != NULL) && ($Account != NULL) && ($Sex != NULL) && ($Email != NULL) && ($PassWord != NULL) && ($PassWord == $PassWord2) 
		&& ($Birthday != NULL) && ($Phone != NULL))
		{
			$new_member = "INSERT INTO `members`(`cName`, `cAccount`, `cPassword`, `cSex`, `cBirthday`, `cPhone`, `cEmail`) 
			VALUES ('".$Name."','".$Account."','".$PassWord."','".$Sex."','".$Birthday."','".$Phone."','".$Email."')";
			$db_link->query($new_member);
			?>
			<div class = "login">
				<div class = "login_zone">
					<div class = "login_member">
						<h4 style="font-size: 0.7em;">會員新辦成功</h4>
					</div>
						
					<div class = "login_keyin" style = "line-height: 100px;">
						<a href='center.php'>回到首頁</a>
					</div>
					
				</div>
			</div>
			<?php
		}
		else
		{
		?>
			<div class = "login">
				<div class = "login_zone">
					<div class = "login_member">
						<h4 style="font-size: 0.7em;">會員申辦失敗</h4>
					</div>
					</br></br>
					<p>資料不足，無法申辦會員</p>
					<div class = "login_keyin" style = "line-height: 100px;">
						<a href='new_member.php'>回到新辦會員</a>
					</div>
					
				</div>
			</div>
		<?php
		}
		?>

		<script>
							// Get the modal
				var modal2 = document.getElementById("myModal2");

				// Get the button that opens the modal
				var btn2 = document.getElementById("check2");

				// Get the <span> element that closes the modal
				var span2 = document.getElementsByClassName("close2")[0];

				// When the user clicks the button, open the modal 
				btn2.onclick = function() {
				  modal2.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span2.onclick = function() {
				  modal2.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal2) {
					modal2.style.display = "none";
				  }
				}
		</script>
	</body>
</html>