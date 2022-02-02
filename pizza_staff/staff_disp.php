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

# staff_list.phpから渡された値を受け取る。
$staff_code=$_GET['staffcode'];

# shopデータベースへの接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

# shopデータベースからスタッフコードを使い名前を取得する。
# mst_staffテーブルからname,positionカラムを選択取得する。
#$sql='SELECT name FROM mst_staff WHERE code=?';
$sql='SELECT name,position FROM mst_staff WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_code; # code=? の？に渡された値を代入する
$stmt->execute($data);

# データベースの検索結果をstaff_name,staff_positionに格納する。
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];
$staff_position=$rec['position'];

# shopデータベースから切断する
$dbh =null;  

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();

}

?>

スタッフ情報参照<br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
<br />
スタッフ名<br />
<?php print $staff_name; ?>
<br />
<br />
スタッフ役職<br />
<?php print $staff_position; ?>
<br />
<br />
<form>
	<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>