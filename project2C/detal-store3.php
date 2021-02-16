<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Nike React Phantom Run Flyknit 2 黑色/白色</title>
	</head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="popup2.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style0423.css">
	<link rel="stylesheet" type="text/css" href="detal-store.css">
	
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
		
		<div class="space"></div>
		
		<div class="container4">
			<div class="piccture_zone">
				<button><img class="picture" src="1.jpg"></button>
				<button><img class="picture" src="2.jpg"></button>
				<button><img class="picture" src="3.jpg"></button>
				<button><img class="picture" src="4.jpg"></button>
				<button><img class="picture" src="5.jpg"></button>
				<button><img class="picture" src="6.jpg"></button>
				
				
			</div>
			<div class="text_zone">
				<div class="name">
					<div class="name2">
						<h4>男款跑鞋</h4>
						<p>Nike React </p>
						<p>Phantom Run</p>
						<p>Flyknit 2</p>
					</div>
					<div class="price">$4,480</div>
					<div class="container5">
						<a href="detal-store.php"><img class="picture2" src="555.jpg" title="Nike React Phantom Run Flyknit 2 White/黑色/Pure Platinum/白色"></a>
						<a href="detal-store2.php"><img class="picture2" src="3331.jpg" title="Nike React Phantom Run Flyknit 2 黑色/Red Orbit/Green Spark/白色"></a>
						<a href="detal-store3.php"><img class="picture2" src="1.jpg" title="Nike React Phantom Run Flyknit 2 黑色/白色"></a>
					</div>
					<div class="container6">
						<div class="size">
							<div class="size2"><h4>選取尺寸</h4></div>
							<div class="size3"><h4>尺寸指南</h4></div>
						</div>
					</div>
					
					<?php
					//echo "登入者：".$_SESSION["login_person"];
					if($_SESSION["login_person"] != NULL)
					{
						$doinglog = "shopping_cart.php";
						$goto_shop = "加入購物車";
					}
					else
					{
						$doinglog = "login.php";
						$goto_shop = "請先登入";
					}
					?>
					
					<form action=<?php echo $doinglog ?> method="post" name=form1 autocomplete="off">
						<div class="container6">
							<div class="size5 css-12whm6j">
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM25" value="CJ0277-001-25">
									<label class="css-xf3ahq" for="CM25" >CM25</label>
								</div>
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM25.5" value="CJ0277-001-25A">
									<label class="css-xf3ahq" for="CM25.5" >CM25.5</label>
								</div>
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM26" value="CJ0277-001-26">
									<label class="css-xf3ahq" for="CM26" >CM26</label>
								</div>
							</div>
							<div class="size5 css-12whm6j">
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM26.5" value="CJ0277-001-26A">
									<label class="css-xf3ahq" for="CM26.5" >CM26.5</label>
								</div>
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM27" value="CJ0277-001-27">
									<label class="css-xf3ahq" for="CM27" >CM27</label>
								</div>
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM27.5" value="CJ0277-001-27A">
									<label class="css-xf3ahq" for="CM27.5" >CM27.5</label>
								</div>
							</div>
							<div class="size5 css-12whm6j">
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM28" value="CJ0277-001-28">
									<label class="css-xf3ahq" for="CM28" >CM28</label>
								</div>
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM28.5" value="CJ0277-001-28A">
									<label class="css-xf3ahq" for="CM28.5" >CM28.5</label>
								</div>
								<div class="css-181a6of">
									<input type="checkbox" name=chkbx[] id="CM29" value="CJ0277-001-29">
									<label class="css-xf3ahq" for="CM29" >CM29</label>
								</div>
							</div>
						</div>
						
						<div class="container6">
							<button class="accc" type="submit" value="送出" name=submit1><?php echo $goto_shop ?></button>
							<button class="accc1">加到最愛</button>
						</div>
					</form>
					
					<div class="container6">
						<p>Nike React Phantom Run Flyknit 2 為日常跑者實現全方位機能。本鞋款以前一代的設計為藍本，將無鞋帶設計發揚光大，穿起來穩固舒適，幾乎感覺不到它的存在。增量泡棉，緩震效能更出色，讓你跑出超凡舒適體驗。</p>
					</div>
					<div class="container6">
						<ul>
							<li>顯示顏色： 黑色/白色</li>
							<li>款式： CJ0277-001</li>
						</ul>
					</div>
					<div class="container6 con2 ">	
						<a class="con1" href="#"><u>深入了解</u></a>
					</div>
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