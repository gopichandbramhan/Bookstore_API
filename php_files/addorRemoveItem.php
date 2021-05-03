<?php
if($_POST["action"] == "update")
	{
	  include('db.php');
	  $productId=$_POST['productId'];
	  $isInCart=$_POST['isInCart'];
	  if($isInCart=="1"){
		$query = "UPDATE tbl_product SET is_in_cart = '0' WHERE id=".$productId;
		echo mysqli_query($con, $query);
		}
		else{
		$query = "UPDATE tbl_product SET is_in_cart = '1' WHERE id=".$productId;
		echo mysqli_query($con, $query);
		}
	}

?>