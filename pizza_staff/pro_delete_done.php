<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> ろくまる農園</title>
</head>
<body>

<?php

try
{
# pro_edit_delete.phpから渡された値を変数に代入する。
$pro_code=$_POST['code'];
$pro_gazou_name=$_POST['gazou_name'];

# shopデータベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

# shopデータベースに対してSQL文で操作を行う。
# 今回はスタッフの削除なのでDELETE文を使う。
# mst_productテーブルから対象の商品コードcodeが持つレコード(全ての情報)を削除する。
$sql='DELETE FROM mst_product  WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

# データベースから切断
$dbh=null;

if($pro_gazou_name != '')
{
	unlink('./gazou/'.$pro_gazou_name);
}

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
<a href="pro_list.php"> 戻る</a>
</body>
</html>