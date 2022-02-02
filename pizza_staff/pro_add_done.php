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
# pro_add_check.phpから渡された値を変数に代入
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name=$_POST['gazou_name'];

$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

# shopデータベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


# データベースに対してSQL文で操作を行う
# 今回は商品の追加なのでINSERT文を使う
$sql='INSERT INTO mst_product(name,price,gazou) VALUES (?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_gazou_name;
$stmt->execute($data);

# データベースから切断
$dbh=null;

print $pro_name;
print 'を追加しました。<br />';

}
# エラー対策を行う。エラー発生した場合の処理（例外処理）
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="pro_list.php"> 戻る</a>

</body>
</html>