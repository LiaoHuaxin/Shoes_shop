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
			
		<div class = "login">
			<div class = "login_zone" style = "width: 320px; height: 700px;">
				<div class = "login_member">
					<h4 style="font-size: 0.7em;">新辦會員</h4>
				</div>
					
				<div class = "login_keyin">
					<form action="new_member_succeed.php" method="post" name=form1>
						<h5><input type="text" name="Name" placeholder="輸入名字"></h5>
						<h5><input type="text" name="Account" placeholder="輸入英文名字"></h5>
						<p style="font-size: 0.8em;">性別
							<input type="radio" name="Sex" value="M" checked>男
							<input type="radio" name="Sex" value="F">女
						</p>
						<h5><input type="text" name="Email" placeholder="帳號請輸入email"></h5>
						<h5><input type="password" name="PassWord" placeholder="請輸入密碼"></h5>
						<h5><input type="password" name="PassWord2" placeholder="請再次輸入密碼"></h5>
						<h5><input type="date" name="Birthday"id="bookdate" placeholder="2020-07-02"></h5>
						<h5><input type="text" name="Phone" placeholder="電話號碼"></h5>
						<input class="account" type="submit" value="新辦帳號" name=submit1 >
						<input class="account" type="reset" value="清除重填" name=reset1>
					</form>
				</div>
				
			</div>
		</div>

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