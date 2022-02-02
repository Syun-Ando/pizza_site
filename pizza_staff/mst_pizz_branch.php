<?php

session_start();
session_regenerate_id(true);
$_SESSION['login']=1;
// if(isset($_SESSION['login'])==false)
// {
//     print'ログインされていません。<br />';
//     print'<a href="mst_pizz_login.html">ログイン画面へ</a>';
//     exit();
// }

//これが見えない頁
//追加ボタンを押された
if(isset($_POST['add'])==true)
{
	header('Location:mst_pizz_add.php');
	exit();
}

//修正ボタンを押された
if(isset($_POST['edit'])==true)
{
	// デフォルト選択済みなのでこれはあり得ない
	if(isset($_POST['procode'])==false)
	{
		header('Location:mst_pizz_ng.php');
		exit();
	}
	$pro_code=$_POST['procode'];
    header('Location:mst_pizz_edit.php?procode='.$pro_code);
	exit();
}

//削除ボタンを押された
if(isset($_POST['delete'])==true)
{
	if(isset($_POST['procode'])==false)
	{
		header('Location:pro_ng.php');
		exit();
	}
	$pro_code=$_POST['procode'];
    header('Location:mst_pizz_delete.php?procode='.$pro_code);
	exit();
}

?>