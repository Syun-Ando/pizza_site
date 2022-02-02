<?php
$cart=$_POST['cart'];

if(isset($_POST['haitatsu'])==true)
{
	$_SESSION['$cart']=$cart;
	header('Location: pizz_menu.php');
	exit();
}

if(isset($_POST['omochikaeri'])==true)
{
	$_SESSION['$cart']=$cart;
	header('Location: pizz_menu.php');
	exit();
}

?>

