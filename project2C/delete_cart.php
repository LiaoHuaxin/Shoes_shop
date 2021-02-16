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
	<link rel="stylesheet" type="text/css" href="popup.css">
	<link rel="stylesheet" type="text/css" href="shopping_cart.css">

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
			<form action="shopping_succeed.php" method="post" name="form1" autocomplete="off">
				<div class="zone1">
					<div class="zone2">
						<h4 class="zzone">目前商品清單</h4>
						<?php 
							//抓取資料庫
							header("Content-Type: text/html; charset=utf-8");
							include("ConnMysqlObj.php");
							
							//從SQL抓取購物車清單
							$get_cart_query = "SELECT `goods`.`cNumber`, `goods`.`cShoeName`, `goods`.`cSize`, `goods`.`cPrice`, 
							`shopping_cart`.`cBuy_item`
							FROM `goods`, `shopping_cart` 
							WHERE `goods`.`cNumber`=`shopping_cart`.`cNumber` AND `shopping_cart`.`cID`=".$_SESSION["login_person_ID"];
							$find_product_result = $db_link->query($get_cart_query);
							
							//秀出商品名稱在刪除商品清單
							echo "<table>";
							while($find_product_row_result = $find_product_result->fetch_assoc())
							{
								echo "<tr>";
								echo "<td><li>".$find_product_row_result['cShoeName']."&nbsp <b>".$find_product_row_result['cSize']."公分&nbsp ("
								.$find_product_row_result['cBuy_item']."雙)</b></li></td>";
								echo "<td><a style='color:#CC0000;' href=delete.php?id=".$find_product_row_result["cNumber"].">刪除</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							?>
							
							
								<div class="zzone3">
									<div  class="button" type="button" name="">
										<div style="width:270px;height:54px; text-align:center; line-height:48px;">
											<a style="color:#CC0000; font-size: 0.8em; text-align:center;" href="delete_all.php">清空購物車</a>
										</div>
									</div>
									<div style = "height:20px;"></div>
									<div  class="button" type="button" name="">
										<div style="width:270px;height:54px; text-align:center; line-height:48px;">
											<a style="color:#000000; font-size: 0.8em; text-align:center;" href="shopping_cart.php">回到購物車</a>
										</div>
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