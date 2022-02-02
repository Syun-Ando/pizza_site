<?php
session_start(); # staff_login_check.phpで作成したセッションを再開する。
session_regenerate_id(true);# 既存のセッションIDを新しく置き換える
if(isset($_SESSION['login'])==false) # セッション変数[login]に値が格納されていない場合（ログイン失敗）
{
	print 'ログインされていません。<br />';
	print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
	exit();
}
else # セッション変数loginに値が格納されている（ログイン成功）
{
	print $_SESSION['staff_name']; # セッション変数のstaff_nameを表示する
	print 'さんログイン中<br />';
	print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

# コメントは#の後に書くことができます
# pro_add.phpから渡された値を受け取る
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
# pro_add.phpから渡されたファイルを受け取る
$pro_gazou=$_FILES['gazou'];

# 攻撃につながる記号（<>など）をサニタイジング
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');


# 条件をよって処理を分岐させる
# この場合は $pro_name が空かどうか
if($pro_name=='')
{
# $pro_name が空だった場合（商品名が入力されなかった場合）
	print '商品名が入力されていません。<br />';
}
else
{
# $pro_name が空ではなかった場合（商品名が入力された場合）
	print '商品名：';
	print $pro_name;
	print '<br />';
}

# 正規表現を用いて$pro_priceの値を検査する
# $pro_priceが半角数字ではなかった場合

# \A[0-9]+\zが正規表現の部分
# 「参考」
# \A　行頭の意味
# []　 []の任意の１文字　(英小文字の任意の１文字[a-z])
# +　直前の文字の1回以上の繰り返し
# \z　行末の意味
# 
if(preg_match('/\A[0-9]+\z/',$pro_price) == 0)
{
	print '価格をきちんと入力してください。<br />';
}
# $pro_priceが半角数字出会った場合
else
{
	print '価格：';
	print $pro_price;
	print '円<br />';
}

# 画像ファイルの検査をする。
# 画像ファイルのサイズが0バイトより大きい(存在する)場合
if($pro_gazou['size']>0)
{
	# 画像ファイルが1,000,000バイト(1MByte)より大きい場合
	if($pro_gazou['size']>1000000)
	{
		print '画像が大き過ぎます';
	}
	else
	# 画像ファイルが1,000,000バイト(1MByte)以下の場合
	{
		# 画像ファイルをファイルを指定した場所から、画像フォルダ./gazou/にアップロードする。
		move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
		print'<img src="./gazou/'.$pro_gazou['name'].'">';
		print'<br />';
		
	}
}

# $pro_price が空か　又は　半角数字ではない　又は　画像サイスが1MBより大きい場合　かどうか。
if($pro_price=='' || preg_match('/\A[0-9]+\z/',$pro_price) == 0 || $pro_gazou['size']>1000000) 
{
# この場合は $pro_price が空か　又は　半角数字ではない　又は　画像ファイルが1MBより大きい場合。
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
# $pro_price が空ではない　かつ　半角数字である場合
else
{
	print '上記の商品を追加します。<br />';
	print '<form method="post" action="pro_add_done.php">';
	print '<input type = "hidden" name="name" value="'.$pro_name.'">';
	print '<input type = "hidden" name="price" value="'.$pro_price.'">';
	print '<input type = "hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
	
	print '<br />';
	print '<input type = "button" onclick="history.back()" value="戻る">';
	print '<input type = "submit" value="ＯＫ">';
	print '</form>';
}
?>

</body>
</html>