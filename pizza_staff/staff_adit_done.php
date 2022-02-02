<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php

	try
	{
	# staff_add_check.phpから渡された値を変数に代入
	$staff_name=$_POST['name'];
	$staff_pass=$_POST['pass'];

	$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
	$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

	# shopデータベースに接続
	$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
	$user='root';
	$password='root';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	# データベースに対してSQL文で操作を行う
	# 今回はスタッフの追加なのでINSERT文を使う
	$sql='INSERT INTO mst_staff (name,password) VALUES (?,?)';
	$stmt=$dbh->prepare($sql);
	$data[]=$staff_name;
	$data[]=$staff_pass;
	$stmt->execute($data);

	# データベースから切断
	$dbh=null;



	}
	# エラー対策を行う。エラー発生した場合の処理（例外処理）
	catch (Exception $e)
	{
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

?>

修正しました。<br />
<br />
<a href="staff_list.php"> 戻る</a>

</body>
</html>