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
    // print $_SESSION['staff_name'];
    print 'Staff';
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

	$piz_name=$_POST['name'];
	$piz_price=$_POST['price']; //これは配列
	$piz_disp=$_POST['disp']; //これは配列
	$piz_gazou_name = $_POST['gazou_name'];

	// $piz_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
	// $piz_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

	$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
	$user='es206';
	$password='pass';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql = 'SELECT MAX(pizza_code) FROM pizza WHERE 1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	$maxcode = $rec['MAX(pizza_code)'];

	$sql = 'INSERT INTO pizza(pizza_code,pizza_name,price,gazou,pizza_size,pizza_disp) VALUES(?,?,?,?,?,?)';
	$stmt = $dbh->prepare($sql);
	$data=array();
	$data[] = ++$maxcode;
	$data[] = $piz_name;
	$data[] = $piz_price[0];
	$data[] = $piz_gazou_name;
	$data[] = 'S';
	$data[] = $piz_disp[0];
	// var_dump($data);
	$stmt->execute($data);

	$data=array();
	$data[] = ++$maxcode;
	$data[] = $piz_name;
	$data[] = $piz_price[1];
	$data[] = $piz_gazou_name;
	$data[] = 'M';
	$data[] = $piz_disp[1];
	$stmt->execute($data);

	$data=array();
	$data[] = ++$maxcode;
	$data[] = $piz_name;
	$data[] = $piz_price[2];
	$data[] = $piz_gazou_name;
	$data[] = 'L';
	$data[] = $piz_disp[2];
	$stmt->execute($data);

	$dbh = null;

	print $piz_name;
	print 'を追加しました。<br />';

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