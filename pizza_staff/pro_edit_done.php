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
# pro_edit_check.phpから渡された値を変数に代入
$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name_old=$_POST['gazou_name_old']; # 古い画像ファイル名
$pro_gazou_name=$_POST['gazou_name'];         # 新しい画像ファイル名


$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

# shopデータベースに接続
$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
$user='es215';
$password='pass';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

# データベースに対してSQL文で操作を行う
# 今回は商品の修正なのでUPDATE文を使う
# mst_productテーブルにおいて、多少の商品コードを持つ商品の商品名と価格と画像ファイル名を更新する
$sql='UPDATE pizza SET pizza_name=?,price=?,gazou=? WHERE pizza_code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_gazou_name;
$data[]=$pro_code;

$stmt->execute($data);

# データベースから切断
$dbh=null;

# 古い画像ファイル名と新しい画像ファイル名が同じ場合、古い画像ファイルが削除されてしまう
if($pro_gazou_name_old != '') # 古い画像ファイル名が空でない場合（古い画像ファイルがある場合）
{
	unlink('./gazou/'.$pro_gazou_name_old); # gazouフォルダ内の古い画像ファイルを削除
}

print $pro_name;
print 'を修正しました。<br />';

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