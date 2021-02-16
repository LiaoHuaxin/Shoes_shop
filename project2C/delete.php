<?php
	session_start();
	include("connMysqlObj.php");
	if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
		$sql_query = "DELETE FROM `shopping_cart` WHERE `cID`=? AND `cNumber`=?";
		$stmt = $db_link -> prepare($sql_query);
		$stmt -> bind_param("is", $_SESSION["login_person_ID"],$_POST["cNumber"]);
		$stmt -> execute();
		$stmt -> close();
		$db_link -> close();
		//重新導向回到主畫面
		header("Location: delete_cart.php");
	}
	$sql_select = "SELECT `goods`.`cNumber`, `goods`.`cShoeName`, `goods`.`cSize`,`shopping_cart`.`cBuy_item` 
	FROM `goods`, `shopping_cart` WHERE `goods`.`cNumber`=`shopping_cart`.`cNumber` AND `shopping_cart`.`cNumber`=? AND 
	`shopping_cart`.`cID`=?";
	$stmt = $db_link -> prepare($sql_select);
	$stmt -> bind_param("si", $_GET["id"],$_SESSION["login_person_ID"]);
	$stmt -> execute();
	$stmt -> bind_result($cNumber, $cShoeName, $cSize, $cBuy_item);
	$stmt -> fetch();
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
		
		<form action="" method="post" name="formDel" id="formDel">
			<div class = "login">
				<div class = "login_zone" style = "margin-top: 120px; width: 450px; height: 450px;">
					<div class = "login_member">
						<h4 style="font-size: 0.7em;">是否要刪除此產品</h4>
					</div>
					
					<?php
					echo "</br>";
						
					echo "<table style='text-align: left;' align='center'>";
					echo "<tr><td>產品編號</td><td>".$cNumber."</td>";
					echo "<tr><td>產品名稱</td><td>".$cShoeName."</td>";
					echo "<tr><td>產品尺寸</td><td>".$cSize."公分</td>";
					echo "<tr><td>購買數量</td><td><b>".$cBuy_item."雙</b></td>";
					echo "</table>";
					?>
					
					<input name="cNumber" type="hidden" value="<?php echo $cNumber ?>">
					<input name="action" type="hidden" value="delete">
					<input type="submit" name="button" id="button" value="刪除此產品">
						
				</div>
			</div>
		</form>
		
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
<?php 
	$stmt -> close();
	$db_link -> close();
?>