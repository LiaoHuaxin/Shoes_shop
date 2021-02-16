<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
		//抓取輸入資料
		$Card_Name = isset($_POST['Card_Name'])?$_POST['Card_Name']:NULL;
		$Card_Num = isset($_POST['Card_Num'])?$_POST['Card_Num']:NULL;
		$Birth_Month = isset($_POST['Birth_Month'])?$_POST['Birth_Month']:NULL;
		$Birth_Year = isset($_POST['Birth_Year'])?$_POST['Birth_Year']:NULL;
		$Safe_Number = isset($_POST['Safe_Number'])?$_POST['Safe_Number']:NULL;
		$Address = isset($_POST['Address'])?$_POST['Address']:NULL;
		
		//抓取總金額資訊
		$Total_Fee = isset($_POST['Total_Fee'])?$_POST['Total_Fee']:0;
		
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
		
		<div class = "login">
			<div class = "login_zone" style = "margin-top: 120px; width: 450px; height: 450px;">
			<?php
			//改變資料形式
			$Card_Name = (string)$Card_Name;
			$Card_Num = (string)$Card_Num;
			$Birth_Month = (int)$Birth_Month;
			$Birth_Year = (int)$Birth_Year;
			$Safe_Number = (string)$Safe_Number;
			$Address = (string)$Address;
			
			$CCNS = mb_strlen($Card_Num);
			$CCSNS = mb_strlen($Safe_Number);
			$BYS = mb_strlen($Birth_Year);
			$Now_Year = date("Y");
			
			if(($Card_Name != NULL) && ($CCNS <= 16 && $CCNS >= 15) && ($Birth_Month >= 1 && $Birth_Month <= 12) 
				&& ($BYS == 4 && ($Now_Year - $Birth_Year) >= 18) && ($CCSNS == 4) && ($Address != NULL))
			{
				//預設可購買燈號為true
				$surplus_pass = true;
				
				//從SQL抓取購物車中，購買數量大於存貨量的產品
				$insufficient_query = "SELECT `goods`.`cNumber` 
				FROM `goods`, `shopping_cart` 
				WHERE `goods`.`cNumber`=`shopping_cart`.`cNumber` AND `shopping_cart`.`cID`=".$_SESSION["login_person_ID"]." AND 
				`goods`.`cInventory`<`shopping_cart`.`cBuy_item`";
				$insufficient_query_result = $db_link->query($insufficient_query);
				
				//若檢查到剩餘產品數不夠，可購買燈號轉為false
				while($insufficient_query_row_result = $insufficient_query_result->fetch_assoc())
				{
					$surplus_pass = false;
				}
				
				//若剩餘產品量足夠
				if($surplus_pass == true)
				{
					//隨機建立訂單編號
					$Order_Num = str_pad(rand(1,999999),6,'0',STR_PAD_LEFT);
					
					//確定訂單編號無重複
					$ON_diff = true;
					
					function check_ON($Order_Num , $ON_diff , $db_link)
					{
						$check_ON_different = "SELECT `cOrder_num` FROM `order_product` WHERE `cOrder_num`=".$Order_Num;
						$check_ON_different_result = $db_link->query($check_ON_different);
						$check_ON_different_row_result = $check_ON_different_result->fetch_assoc();
						if($check_ON_different_row_result != NULL)
						{
							$ON_diff = false;
						}
						if($ON_diff == false)
						{
							$Order_Num = str_pad(rand(1,999999),6,'0',STR_PAD_LEFT);
							$ON_diff = true;
							$Order_Num = check_ON($Order_Num , $ON_diff , $db_link);
						}
						return $Order_Num;
					}
					
					$Order_Num = check_ON($Order_Num , $ON_diff , $db_link);
					
					
					//從SQL抓取購物車清單
					$get_cart_query = "SELECT `cNumber`, `cBuy_item` 
					FROM `shopping_cart` WHERE `cID`=".$_SESSION["login_person_ID"];
					$find_product_result = $db_link->query($get_cart_query);
							
					//將購物清單移到SQL正式訂單內
					while($find_product_row_result = $find_product_result->fetch_assoc())
					{
						$move_order_query = "INSERT INTO `order_product`(`cOrder_num`, `cID`, `cNumber`, `cBuy_item`, `cAddress`) 
						VALUES (".$Order_Num.",".$_SESSION["login_person_ID"].",'".$find_product_row_result['cNumber']."
						',".$find_product_row_result['cBuy_item'].",'".$Address."')";
						$db_link->query($move_order_query);
					}
					
					//將剩餘產品量扣除剩餘量
					$minus_inventory = "SELECT `goods`.`cNumber`,`goods`.`cInventory`,`shopping_cart`.`cBuy_item` 
					FROM `goods`, `shopping_cart` WHERE `goods`.`cNumber`=`shopping_cart`.`cNumber` AND 
					`shopping_cart`.`cID`=".$_SESSION["login_person_ID"];
					$minus_inventory_result = $db_link->query($minus_inventory);
					while($minus_inventory_row_result = $minus_inventory_result->fetch_assoc())
					{
						$New_inventary = $minus_inventory_row_result['cInventory'] - $minus_inventory_row_result['cBuy_item'];
						$minus_inventory_query = "UPDATE `goods` SET `cInventory`= ".$New_inventary." 
						WHERE `cNumber` = '".$minus_inventory_row_result['cNumber']."'";
						$db_link->query($minus_inventory_query);
					}
					
					//將購物車內清單清空
					$delete_cart = "DELETE FROM `shopping_cart` WHERE `cID`=".$_SESSION["login_person_ID"];
					$db_link->query($delete_cart);
					
					//秀出成功購買資訊
					echo "<div class = 'login_member'>";
					echo "<h4 style='font-size: 0.7em;'><b>購買成功</b></h4>";
					echo "</div>";
					
					echo "</br>";
					
					echo "<table style='text-align: left;' align='center'>";
					echo "<tr><td>購買者帳號名稱</td><td>".$_SESSION["login_person"]."</td>";
					echo "<tr><td>購買者信用卡名字</td><td>".$Card_Name."</td>";
					echo "<tr><td>出生年月日</td><td>".$Birth_Year."年".$Birth_Month."月</td>";
					echo "<tr><td>住家地址</td><td>".$Address."</td>";
					echo "<tr><td>總金額</td><td style='color:#ff0000;'><b>".$Total_Fee."</b></td>";
					echo "<tr><td>訂單編號</td><td><b>".$Order_Num."</b></td>";
					echo "</table>";

					echo "</br>";
					echo "商品將於訂購後3~7日內送達。</br>";
					echo "網路訂購商品亦享有7日鑑賞期。</br>";
					
					echo "<div class = 'login_keyin' style = 'margin-top: 30px;'>";
					echo "<a href='center.php'>回到首頁";
					echo "</div>";
				}
				else //若剩餘產品量不夠
				{
					echo "<div class = 'login_member'>";
					echo "<h4 style='font-size: 0.7em;'><b>購買失敗</b></h4>";
					echo "</div>";
					
					echo "</br>";
					echo "</br>";
					
					echo "購買失敗，貨品存貨不足</br>";
					echo "請回上一頁刪除產品</br>";
					echo "<div class = 'login_keyin' style = 'margin-top: 30px;'>";
					echo "<a href='shopping_cart.php'>回到購物車";
					echo "</div>";
				}
			}
			else //資料輸入錯誤
			{
				echo "<div class = 'login_member'>";
				echo "<h4 style='font-size: 0.7em;'><b>購買失敗</b></h4>";
				echo "</div>";
				
				echo "</br>";
				echo "</br>";
				
				echo "購買失敗，資料未填齊</br>";
				echo "請回上一頁重新填寫</br>";
				echo "<div class = 'login_keyin' style = 'margin-top: 30px;'>";
				echo "<a href='shopping_cart.php'>回到購物車";
				echo "</div>";
			}
			?>
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