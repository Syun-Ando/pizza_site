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

# staff_list.phpから渡された値を受け取る。
$staff_code=$_GET['staffcode'];

# shopデータベースへの接続
$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
$user='es215';
$password='pass';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

# shopデータベースからスタッフコードを使い名前を取得する。
# mst_staffテーブルからnameカラムを選択取得する。
$sql='SELECT staff_name FROM staff WHERE staff_code=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_code; # code=? の？に渡された値を代入する
$stmt->execute($data);

# データベースの検索結果をstaff_nameに格納する。
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['staff_name'];

# shopデータベースから切断する
$dbh =null;  

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();

}

?>

<!-- 画面のページ説明 -->
スタッフ削除<br />
<br />

<!-- 削除するレコードを表示 -->
スタッフコード<br />
<?php print $staff_code; ?>
<br />
スタッフ名<br />
<?php print $staff_name; ?>
<br/>

<!-- 削除の確認 -->
このスタッフを削除してよろしいですか？<br />
<br />

<!-- 選択画面では"code"を送る -->
<form method="post" action="staff_delete_done.php">
	<input type="hidden" name="code" value="<?php print $staff_code; ?>">
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" value="ＯＫ">
</form>

</body>
</html>