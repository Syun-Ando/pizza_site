<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインされていません。<br />';
    print'<a href="mst_pizz_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print '　さんログイン中<br />';
    print '<br />';
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza_Store</title>
</head>
<body>

<?php

try
{

	$piz_code=$_POST['code']; //これは配列
	$piz_name=$_POST['name'];
	$piz_price=$_POST['price']; //これは配列
	$piz_disp=$_POST['disp']; //これは配列
	$piz_gazou_name_old=$_POST['gazou_name_old'];
	$piz_gazou=$_POST['gazou_name']; //nonは変更なし

	//今回は急ぎにて実施せず
	// $pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
	// $pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
	// $pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');
	if($piz_gazou=='non'){
		$piz_gazou_name=$piz_gazou_name_old;
	}else
	{
		$piz_gazou_name=$piz_gazou;
	}
	
	$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
	$user='es206';
	$password='pass';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = 'LOCK TABLES pizza WRITE';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$sql = 'UPDATE pizza SET pizza_name=?,price=?,gazou=?
	,pizza_size=?,pizza_disp=? WHERE pizza_code=?';
	$stmt = $dbh->prepare($sql);
	$data[] = $piz_name;
	$data[] = $piz_price[0];
	$data[] = $piz_gazou_name;
	$data[] = 'S';
	$data[] = $piz_disp[0];
	$data[] = $piz_code[0];
	$stmt->execute($data);

	$data=array();
	$data[] = $piz_name;
	$data[] = $piz_price[1];
	$data[] = $piz_gazou_name;
	$data[] = 'M';
	$data[] = $piz_disp[1];
	$data[] = $piz_code[1];
	$stmt->execute($data);

	$data=array();
	$data[] = $piz_name;
	$data[] = $piz_price[2];
	$data[] = $piz_gazou_name;
	$data[] = 'L';
	$data[] = $piz_disp[2];
	$data[] = $piz_code[2];
	$stmt->execute($data);

	$sql = 'UNLOCK TABLES';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$dbh = null;
	// 画像ファイルはそのままとする
	// if($piz_gazou !='non')
	// {
	// 	if($piz_gazou_name_old!='')
	// 		{
	// 			unlink('../img/'.$piz_gazou_name_old);
	// 		}
	// }
	print '修正しました。<br />';
}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();

}

?>

<a href="mst_pizz_list.php">戻る</a>

</body>
</html>