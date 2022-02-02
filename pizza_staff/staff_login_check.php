<?php

try
{
	# staff_login.htmlからスタッフコード（code）、パスワード（pass）の値を受け取る
	$staff_code=$_POST['code'];
	$staff_pass=$_POST['pass'];

	# 受け取った値をサニタイズする。
	$staff_code=htmlspecialchars($staff_code,ENT_QUOTES,'UTF-8');
	$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

	# $staff_passを暗号化する
	// $staff_pass=md5($staff_pass);

	# shopデータベースに接続する
	$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
	$user='es215';
	$password='pass';

	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	# mst_staffテーブルからスタッフコードパスワードを使って名前を取得
	$sql='SELECT staff_name FROM staff WHERE staff_code=? AND staff_pass=?';
	$stmt=$dbh->prepare($sql);
	$data[]=$staff_code;
	$data[]=$staff_pass;
	$stmt->execute($data);

	# データベースから切断
	$dbh=null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)	#ログイン失敗したときの処理
	{
		print 'スタッフコードかパスワードが間違っています。<br />';
		print '<a href="staff_login.html">戻る</a>';
	}
	else		
	{
		session_start();   #セッションを開始　セッション変数が1のときログインに成功している
		$_SESSION['login']=1;
		$_SESSION['staff_code']=$staff_code;
		$_SESSION['staff_name']=$rec['staff_name'];
		header('Location: staff_top.php');
		exit();
	}

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>
