<?php
// セッション利用にはsession_startが必須
session_start();
// $cart=$_POST['cart'];
// ここで配列に移動させます。参考書190頁と同様の処理です
$cart[]=$_POST['cart']; 
//ここでセッションに移動
//['$cart']ではなく['cart']
$_SESSION['cart']=$cart;
if(isset($_POST['haitatsu'])==true)
{
	// $_SESSION['$cart']=$cart;
	header('Location: pizz_menu2.php');
	exit();
}

if(isset($_POST['omochikaeri'])==true)
{
	// $_SESSION['$cart']=$cart;
	header('Location: pizz_menu2.php');
	exit();
}

?>

