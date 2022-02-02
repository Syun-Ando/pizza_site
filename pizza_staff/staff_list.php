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
	# shopデータベースへの接続
	$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
	$user='es215';
	$password='pass';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	# shopデータベースに対してSQL文で操作を行う。
	# 今回はスタッフの一覧を取得するのでSELECT文を使う。対象は全てのデータ。
	# mst_staffテーブルからスタッフコードcodeカラムと、名前nameカラムを選択取得する。
	$sql='SELECT staff_code,staff_name FROM staff WHERE 1';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();

	# shopデータベースから切断する
	$dbh=null;

	# 移動先のファイルを指定する。
	# print '<form method="post" action="staff_edit.php">';
	print '<form method="post" action="staff_branch.php">';
	print 'スタッフ一覧<br/><br/>';

	# 繰り返し処理を行う。
	# while(true)は無限に繰り返し処理を行う（無限ループ）
	while(true)
	{
		# １つづつレコードを取り出す
		$rec=$stmt->fetch(PDO::FETCH_ASSOC);
		# レコードが無くなった場合の条件分岐
		if($rec==false)
		{
			# 繰り返し処理を終了させる。（無限ループから抜ける）
			break;	
		}
		# スタッフコードはPRIMARYに設定されてるカラムのため、
        # code(スタッフコード)さえ分かれば名前とパスワードが特定できる。
		print '<input type="radio" name="staffcode" value="'.$rec['staff_code'].'">';
		# レコードのnameカラムの表示
		print $rec['staff_name'];
		print '<br />';
	}
	# 参照ボタン・追加ボタン・修正ボタン・削除ボタンの追加
	print '<input type="submit" name="disp" value="参照">';
	print '<input type="submit" name="add" value="追加">';
	print '<input type="submit" name="edit" value="修正">';
	print '<input type="submit" name="delete" value="削除">';
	print '<br/>';

}
catch (Exception $e)	# エラーが発生した場合の処理
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

<br />
<a href="../pizza_staff/staff_top.php">トップメニューへ</a><br />

</body>
</html>
