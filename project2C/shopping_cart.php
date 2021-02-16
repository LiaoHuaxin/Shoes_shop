<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" type="text/css" href="popup2.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="popup.css">
		<link rel="stylesheet" type="text/css" href="shopping_cart.css">
		<title>NIKE --SHOPPING CART--</title>
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
			<form action="shopping_succeed.php" method="post" name="form1" autocomplete="off">
				<div class="zone1">
					<div class="zone2">
						<h4 class="zzone">購買商品清單</h4>
						<?php 
							//抓取前面的購買項
							$chkbx = isset($_POST['chkbx'])?$_POST['chkbx']:NULL;
							
							//抓取資料庫
							header("Content-Type: text/html; charset=utf-8");
							include("ConnMysqlObj.php");
							
							//若連線成功且有選擇購買物品，將購買清單放入sql資料庫
							if($sql_connect == true)
							{
								if($chkbx != NULL)
								{
									//echo "<li>成功判定</li>";
									$put_sql_num = count($chkbx);
									//以迴圈一項一項放入SQL
									for($pi = 0; $pi < $put_sql_num; $pi++)
									{
										//先搜尋購買品項是否已有在SQL內
										$find_query = "SELECT * FROM `shopping_cart` WHERE `cID`=".$_SESSION["login_person_ID"]." AND 
										`cNumber`='".$chkbx[$pi]."'";
										$find_product_result = $db_link->query($find_query);
										$find_product_row_result = $find_product_result->fetch_assoc();
										//print_r ($find_product_row_result);
										
										//若購買品項已有在SQL內，將數量+1
										if($find_product_row_result != NULL)
										{
											$find_product_Number = $find_product_row_result['cNumber'];
											$find_product_item = $find_product_row_result['cBuy_item'];
											$New_product_item = $find_product_item + 1;
											//echo "New_product_item = ".$New_product_item;
											$plus_product_item_query = "UPDATE `shopping_cart` SET `cBuy_item`=".$New_product_item." 
											WHERE `cID`=".$_SESSION["login_person_ID"]." AND `cNumber`='".$find_product_Number."'";
											$db_link->query($plus_product_item_query);
										}
										//若購買品項未在SQL內，新增條目在SQL內
										else
										{
											$add_query = "INSERT INTO `shopping_cart`(`cID`, `cNumber`, `cBuy_item`) 
											VALUES (".$_SESSION["login_person_ID"].",'".$chkbx[$pi]."',1)";
											$db_link->query($add_query);
										}
									}
									//預防重新整理網頁時，購買商品再次被輸入SQL
									$chkbx = "";
								}
								else
								{
									//echo "<li>成功判定??</li>";
								}
							}
							else
							{
								echo "<li>未連線至資料庫，請修改ConnMysqlObj.php內的密碼</li>";
							}
							
							//從SQL抓取購物車清單
							$get_cart_query = "SELECT `goods`.`cNumber`, `goods`.`cShoeName`, `goods`.`cSize`, `goods`.`cPrice`, 
							`shopping_cart`.`cBuy_item`
							FROM `goods`, `shopping_cart` 
							WHERE `goods`.`cNumber`=`shopping_cart`.`cNumber` AND `shopping_cart`.`cID`=".$_SESSION["login_person_ID"];
							$find_product_result = $db_link->query($get_cart_query);
							
							//設定摘要參數
							$product_item = 0; //商品數
							$product_Fee = 0; //小記
							$Handling_Fee = 0; //預估運費與手續費
							
							//秀出商品名稱在購買商品清單
							if($_SESSION["login_person"] != "")
							{
								while($find_product_row_result = $find_product_result->fetch_assoc())
								{
									echo "<li>".$find_product_row_result['cShoeName']."&nbsp <b>".$find_product_row_result['cSize']."公分&nbsp ("
									.$find_product_row_result['cBuy_item']."雙)</b></li>";
									$product_item = $product_item + $find_product_row_result['cBuy_item'];
									$product_Fee = $product_Fee + ($find_product_row_result['cPrice'] * $find_product_row_result['cBuy_item']);
								}
								if($product_item == 0)
								{
									echo "<li>這裡空空的喔，快去購買吧</li>";
								}
							}
							else
							{
								echo "<li>你還沒登入喔，快去登入吧</li>";
							}
							
							//運費擴充區
							//4500(不含)以下5%運費，4500~13499間2%運費，13500(含)以上免運
							if($product_Fee < 4500)
							{
								$Handling_Fee = round($product_Fee * 0.05);
							}
							else if(($product_Fee >= 4500) && ($product_Fee < 13500))
							{
								$Handling_Fee = round($product_Fee * 0.02);
							}
							else
							{
								$Handling_Fee = $product_Fee * 0;
							}
						?>
						 
						<h4 class="zzone">付費資訊及寄送服務</h4>
						<div class="zzone4">
							<li class="	li"><input class="input" type="text" placeholder="信用卡上的姓名"  name="Card_Name"></li>
							<li class="	li"><input class="input" type="text"  placeholder="卡號" name="Card_Num"></li>
							<li class="	li"><input class="input2" type="text"  placeholder="月月" name="Birth_Month">
								<input class="input2" type="text"  placeholder="年年年年" name="Birth_Year"></li>
							<li class="	li"><input class="input2" type="text"  placeholder="安全碼" name="Safe_Number"></li>
							<li class="	li"><input class="input" type="text" placeholder="住家地址.ex台北市大安區忠孝東路三段1號" name="Address"></li>					
						</div>
						
						<div class="down_detal"></div>
					</div>
				</div>
				
				<div class="zone3">	
					<h4 class="zzone1">摘要</h4>
					<div class="zzone2">
						<div class="zone4">商品數</div>	
						<div class="zone5">
							<?php	
								echo $product_item;
							?>
						</div>
					</div>
					
					<div class="zzone2">
						<div class="zone4">小記</div>	
						<div class="zone5">
							<?php
								echo "$";
								echo $product_Fee;
							?>
						</div>
					</div>
					
					<div class="zzone2">
						<div class="zone4">預估運費和手續費</div>	
						<div class="zone5">
							<?php
								echo "$";	
								echo $Handling_Fee;
							?>
						</div>
					<hr>
					</div>
					
					<div class="zzone2">
						<div class="zone4">總計</div>	
						<div class="zone5">
							<?php
								$Total_Fee = $product_Fee + $Handling_Fee;
								echo "$";	
								echo $Total_Fee;
							?>
							<!--將總金額以hidden傳出-->
							<input  type="hidden"  name="Total_Fee"  value="<?php echo $Total_Fee ?>" >
						</div>
					</div>
					
					<hr>
					
					<?php
					//購物車內需有物品才可結帳
					if($product_item > 0)
					{
						$checkout = "會員結帳";
						$check_buy_text = "確認購買";
						$can_del = "delete_cart.php";
						$can_del_text = "欲修改商品清單請點這";
					}
					else
					{
						$checkout = "沒有商品，無法結帳";
						$check_buy_text = "結帳失敗";
						$can_del = "";
						$can_del_text = "無產品在購物車內";
					}
					?>
					<div class="zzone3"></div>
					<div class="zzone3">
						<div  class="button" type="button" name="">
							<div style="width:270px;height:54px; text-align:center; line-height:48px;">
								<a style="color:#000000; font-size: 0.8em; text-align:center;" href="<?php echo $can_del ?>"><?php echo $can_del_text ?></a>
							</div>
						</div>
					</div>
					
					<?php
					if(($_SESSION["login_person"] != "") && ($product_item > 0))
					{
						?>
						<div class="zzone3"></div>
						<div class="zzone3"></div>
						<div class="zzone3"></div>
						<div class="zzone3">
							<input id="" class="button" type="button" name="" value="<?php echo $checkout ?>" 
							onclick="if(confirm('送出訂單視同對產品和金額無異議，確定要送出訂單嗎？')) this.form.submit();">
						</div>
					<?php
					}
					?>
				</div>
			</form>
		</main>
		
		<!-- 這裡是javascript語法 ，控制彈出頁面 -->
		<script>
			// Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

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
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
	</body>
</html>
