<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ピザ屋</title>
</head>
<body>

<?php

	# コメントは#の後に書くことができます
	# pro_add.phpから渡された値を受け取る
	$pro_name=$_POST['name'];
	$pro_price1=$_POST['price1'];
	$pro_price2=$_POST['price2'];
	$pro_price3=$_POST['price3'];
	$pro_gazou=$_FILES['gazou'];



	# 攻撃につながる記号（<>など）をサニタイジング
	$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
	$pro_price1=htmlspecialchars($pro_price1,ENT_QUOTES,'UTF-8');
	$pro_price2=htmlspecialchars($pro_price2,ENT_QUOTES,'UTF-8');
	$pro_price3=htmlspecialchars($pro_price3,ENT_QUOTES,'UTF-8');

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

	# 条件をよって処理を分岐させる
	# この場合は 商品の金額$pro_priceを確認する。（半角数字）
	if(preg_match('/\A[0-9]+\z/', $pro_price1)==0)
	{
		# $pro_priceが半角数字ではない場合
		print '金額をきちんと入力してください。<br />';
	}
	else
	{
		print '価格：';
		print $pro_price1;
		print '円<br />';
	}

	if(preg_match('/\A[0-9]+\z/', $pro_price2)==0)
	{
		# $pro_priceが半角数字ではない場合
		print '金額をきちんと入力してください。<br />';
	}
	else
	{
		print '価格：';
		print $pro_price2;
		print '円<br />';
	}

	if(preg_match('/\A[0-9]+\z/', $pro_price3)==0)
	{
		# $pro_priceが半角数字ではない場合
		print '金額をきちんと入力してください。<br />';
	}
	else
	{
		print '価格：';
		print $pro_price3;
		print '円<br />';
	}


	# 条件をよって処理を分岐させる
	# この場合は 商品の画像$pro_gazouを確認する。
	if($pro_gazou['size']>0)
	{
		if($pro_gazou['size']>1000000)
		{
			print '画像が大き過ぎます。';
		}
		else
		{
			move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
			print '<img src="./gazou/'.$pro_gazou['name'].'">';
			print '<br />';
		}
	}
	

	# 条件をよって処理を分岐させる
	# この場合は $pro_nameが空　又は　$pro_priceが半角数字ではない場合
	if($pro_name=='' || preg_match('/\A[0-9]+\z/',$pro_price1)==0 || $pro_gazou['size']>1000000)
	{
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>';
	}
	else
	{
		#以下、正常な入力の場合
		print '上記の商品を追加します。';
		print '<form method="post" action="pro_add_done.php">';
		print '<input type="hidden" name="name" value="'.$pro_name.'">';
		print '<input type="hidden" name="price" value="'.$pro_price1.'">';
		print '<input type="hidden" name="price" value="'.$pro_price2.'">';
		print '<input type="hidden" name="price" value="'.$pro_price3.'">';
		print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
		print '<br />';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '<input type="submit" value="ＯＫ">';
		print '</form>';
	}

?>

</body>
</html>