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

# pro_list.phpから渡された値を受け取る。
$pro_code=$_GET['procode'];

# shopデータベースへの接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

# shopデータベースからスタッフコードを使い名前を取得する。
# mst_productテーブルから商品コードを使用して商品名nameを選択取得する。
# 確認画面なので削除(DELETE文は利用しない)
$sql='SELECT name,gazou FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code; # code=? の？に渡された値を代入する
$stmt->execute($data);

# データベースの検索結果をpro_name,pro_gazou_nameに格納する。
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_gazou_name=$rec['gazou'];

# shopデータベースから切断する
$dbh =null; 

if($pro_gazou_name=='')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
}


}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();

}

?>

商品削除<br />
<br />
商品コード<br />
<?php print $pro_code; ?>
<br />
商品名<br />
<?php print $pro_name; ?>
<br />
<?php print $disp_gazou; ?>
<br />
この商品を削除してよろしいですか？<br />
<br />

<form method="post" action="pro_delete_done.php">
	<input type="hidden" name="code" value="<?php print $pro_code; ?>">
	<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" value="ＯＫ">
</form>

</body>
</html>