<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>pizza_store</title>
</head>
<body>
<?php
	try
	{
		# staff_add_check.phpから渡された値を変数に代入
		$staff_code=$_POST['code'];
		$staff_code=htmlspecialchars($staff_code,ENT_QUOTES,'UTF-8');

		# shopデータベースに接続
		$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
		$user='es215';
		$password='pass';
		$dbh=new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		# データベースに対してSQL文で操作を行う
		# 今回はスタッフのデータの削除なのでDELETE文を使う
		$sql='DELETE FROM staff WHERE staff_code=?';
		$stmt=$dbh->prepare($sql);
		$data[]=$staff_code;
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

削除しました。<br />
<br />
<a href="staff_list.php"> 戻る</a>

</body>
</html>