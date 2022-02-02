<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインされていません。<br />';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print$_SESSION['staff_name'];
    print'さんがログイン中<br />';
    print'<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza_Store</title>
</head>
<body>

<?php

	# コメントは#の後に書くことができます
	# staff_add.phpから渡された値を受け取る
	$staff_name=$_POST['name'];
	$staff_pass=$_POST['pass'];
	$staff_pass2=$_POST['pass2'];

	//print $staff_name;
	//print '<br />';
	//print $staff_pass;
	//print '<br />';
	//print $staff_pass2;
	//print '<br />';
	
	# 攻撃につながる記号（<>など）をサニタイジング
	$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
	$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
	$staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

	//print $staff_name;
	//print '<br />';
	//print $staff_pass;
	//print '<br />';
	//print $staff_pass2;
	//print '<br />';

	# 条件をよって処理を分岐させる
	# この場合は $staff_name が空かどうか
	if($staff_name=='')
	{
		# $staff_name が空だった場合（スタッフ名が入力されなかった場合）
		print 'スタッフ名が入力されていません。<br />';
	}
	else
	{
		# $staff_name が空ではなかった場合（スタッフ名が入力された場合）
		print 'スタッフ名：';
		print $staff_name;
		print '<br />';
	}

	# 条件をよって処理を分岐させる
	# この場合は $staff_pass が空かどうか
	if($staff_pass=='')
	{
		# $staff_passが空だった場合（パスワードが入力されなかった場合）
		print 'パスワードが入力されていません。<br />';
	}

	# 条件をよって処理を分岐させる
	# この場合は $staff_pass と$staff_pass2 がイコールでない場合
	if($staff_pass!=$staff_pass2)
	{
		# パスワード1とパスワード2が異なっていた場合
		print 'パスワードが一致しません。<br />';
	}

	if($staff_name=='' || $staff_pass=='' || $staff_pass!=$staff_pass2)
	{
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>';
	}
	else
	{
		$staff_pass=md5($staff_pass);

		//	print $staff_pass;
		//	print '<br />';

		print '<form method="post" action="staff_add_done.php">';
		print '<input type="hidden" name="name" value="'.$staff_name.'">';
		print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
		print '<br />';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '<input type="submit" value="ＯＫ">';
		print '</form>';
	}

?>

</body>
</html>