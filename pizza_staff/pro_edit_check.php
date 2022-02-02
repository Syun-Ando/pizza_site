<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

	# コメントは#の後に書くことができます
	# pro_edit.phpから渡された値を受け取る
	$pro_code=$_POST['code'];
	$pro_name=$_POST['name'];
	$pro_price=$_POST['price'];
	$pro_gazou_name_old=$_POST['gazou_name_old'];
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

	if($pro_gazou['size']>0)
	{
		if($pro_gazou['size']>1000000)
		{
			print '画像が大き過ぎます';
		}
		else
		{
			move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
			print '<img src="./gazou/'.$pro_gazou['name'].'">';
			print '<br />';	
		}
	}

	# 条件をよって処理を分岐させる
	# 正規表現を用いて$pro_priceの値を検査する
	# $pro_priceが半角数字ではなかった場合(結果が偽であり戻り値0になる)
	# \A[0-9]+\zが正規表現の部分
	# 「参考」
	# \A　「文字列の開始」の意味
	# []　 []の任意の１文字　(英小文字の任意の１文字[a-z])
	# +　直前の文字の1回以上の繰り返し
	# \z　「文字列の末尾」の意味
	if(preg_match('/\A[0-9]+\z/',$pro_price)==0 )
	{
		print '価格をきちんと入力してください。<br />';
	}
	# $pro_priceが半角数字であった場合
	else
	{
		# $pro_price が空ではなかった場合（商品名が入力された場合）
		print '価格：';
		print $pro_price;
		print '円<br />';
	}

	# 条件をよって処理を分岐させる
	# $pro_nameが空か　又は　半角数字ではない場合かどうか。
	if($pro_name=='' || preg_match('/\A[0-9]+\z/',$pro_price)==0 || $pro_gazou['size']>1000000)
	# この場合は $pro_nameが空か　又は　半角数字ではない場合。
	{
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>';
	}
	else
	{
		print '上記のように変更します。';
		print '<form method="post" action="pro_edit_done.php">';
		print '<input type="hidden" name="code" value="'.$pro_code.'">';
		print '<input type="hidden" name="name" value="'.$pro_name.'">';
		print '<input type="hidden" name="price" value="'.$pro_price.'">';
		print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
		print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
		print '<br />';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '<input type="submit" value="ＯＫ">';
		print '</form>';
	}

?>

</body>
</html>