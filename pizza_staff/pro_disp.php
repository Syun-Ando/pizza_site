<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ピザ屋</title>
</head>
<body>
<?php
try
{
	# pro_branch.phpから渡された値を受け取る。
	$pro_code=$_GET['procode'];

	# shopデータベースへの接続
	$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
	$user='es215';
	$password='pass';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	# shopデータベースから商品コードを使い名前を取得する。
	# mst_productテーブルからname,price,gazouカラムを選択取得する。
	$sql='SELECT pizza_name,price,gazou FROM pizza WHERE pizza_code=?';
	$stmt=$dbh->prepare($sql);
	$data[]=$pro_code; # code=? の？に渡された値を代入する
	$stmt->execute($data);

	# データベースの検索結果をpro_name,pro_price,pro_gazouに格納する。
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	$pro_name=$rec['pizza_name'];
	$pro_price=$rec['price'];
	$pro_gazou_name=$rec['gazou'];

	# shopデータベースから切断する
	$dbh =null;  

	if($pro_gazou_name=='')
	{
		$disp_gozou='';
	}
	else
	{
		$disp_gozou='<img src="../img/'.$pro_gazou_name.'">';
	}
}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();

}

?>

商品情報参照<br />
<br />
商品コード<br />
<?php print $pro_code; ?><br />
<br />
商品名<br />
<?php print $pro_name; ?><br />
<br />
価格<br />
<?php print $pro_price; ?>円<br />
<br />
<?php print $disp_gozou; ?>
<br />

<form>
	<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>