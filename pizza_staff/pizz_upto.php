<?php
// session_start();
// session_regenerate_id(true);
// if(isset($_SESSION['login'])==false)
// {
//     print'ログインされていません。<br />';
//     print'<a href=mst_pizz_login.html">ログイン画面へ</a>';
//     exit();
// }
// else
// {
//     print $_SESSION['staff_name'];
//     print '　さんログイン中<br />';
//     print '<br />';
// }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza_Store</title>
</head>
<body>

<?php

// $piz_name=$_POST['name'];
// $piz_price=$_POST['price']; //これは配列
// $piz_disp=$_POST['disp']; //これは配列
$piz_gazou=$_FILES['gazou'];
$piz_gazou2=$_FILES['gazou2'];
$piz_gazou3=$_FILES['gazou3'];
$pdisp = array('0:全て表示','1:宅配のみ表示','2:持帰のみ表示','3:非表示');
// $pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
// $pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');
	if($piz_gazou['tmp_name']!=''){
		move_uploaded_file($piz_gazou['tmp_name'],'../pizza_pro/'.$piz_gazou['name']);
		print'pizz_proにアップしました。';
		print'<br />';
	}

	if($piz_gazou2['tmp_name']!=''){
		move_uploaded_file($piz_gazou2['tmp_name'],'../css/'.$piz_gazou2['name']);
		print'cssにアップしました。';
		print'<br />';
	}
	if($piz_gazou3['tmp_name']!=''){
			move_uploaded_file($piz_gazou3['tmp_name'],'../pizza_staff/'.$piz_gazou3['name']);
		print'pizz_staffにアップしました。';
		print'<br />';
	}

		print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';

?>
</body>
</html>
