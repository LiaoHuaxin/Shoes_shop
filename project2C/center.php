<?php
	session_start();
	if(!isset($_SESSION["login_person"]))
	{
		$_SESSION["login_person"] = "";
	}
	if(!isset($_SESSION["login_person_ID"]))
	{
		$_SESSION["login_person_ID"] = "";
	}
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" type="text/css" href="popup2.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style0423.css">
		<title>NIKE --JUST DO IT--</title>
	</head>

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
		
		<main>
		
			<?php
			//echo "登入者：".$_SESSION["login_person"];
			?>
		
			<div>
				<div><h1>男款</h1></div>
				<ul class="container2">
					&nbsp &nbsp &nbsp
					<li><a href="" class="shoes"></a>鞋款</li>
					<li><a href="" class="clothes">服裝</a></li>
					<li><a href="" class="suggest"></a>運動服飾推薦</li>
				</ul>
			</div>
				
			<div>
				<img src="111.jpg" class="img1">
			</div>
					
			<div>
				<h1>精選鞋款</h1>
				<div container3>
					<a href="detal-store.php" class="BOX1">
						<img src="222.jpg" class="img2" title="Nike React Phantom Run Flyknit 2 White/黑色/Pure Platinum/白色">
						<div>
							<h4>Nike React Phantom Run Flyknit 2</h4>
							<h4>White/黑色/Pure Platinum/白色</h4>
							<h3>&nbsp &nbsp &nbsp &nbsp 男款跑鞋</h3>
							<h3>&nbsp &nbsp &nbsp &nbsp $4480.00</h3>
						</div>
					</a>
							
					<a href="detal-store2.php" class="BOX2">
						<img src="3331.jpg" class="img2" title="Nike React Phantom Run Flyknit 2 黑色/Red Orbit/Green Spark/白色">
						<div>
							<h4>Nike React Phantom Run Flyknit 2</h4>
							<h4>黑色/Red Orbit/Green Spark/白色</h4>
							<h3>&nbsp &nbsp &nbsp &nbsp 男款跑鞋</h3>
							<h3>&nbsp &nbsp &nbsp &nbsp $4480.00</h3>
						</div>
					</a>
							
					<a href="detal-store3.php" class="BOX3">
						<img src="1.jpg" class="img2" title="Nike React Phantom Run Flyknit 2 黑色/白色">
						<div>
							<h4>Nike React Phantom Run Flyknit 2</h4>
							<h4>黑色/白色</h4>
							<h3>&nbsp &nbsp &nbsp &nbsp 男款跑鞋</h3>
							<h3>&nbsp &nbsp &nbsp &nbsp $4480.00</h3>
						</div>
					</a>
				</div>
			</div>
		</main>
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
