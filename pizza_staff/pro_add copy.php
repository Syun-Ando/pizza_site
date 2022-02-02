<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ピザ屋</title>
</head>
<body>
	商品追加<br />
	<br />
	<!-- 送信フォームの作成 -->
	<!-- 送信方法と送信先を指定する-->
	<form method="post" action="pro_add_check.php">
		ピザの名前<br />
		<!-- テキストボックスを用意して名前「name」をつける。幅は200pxに変更-->
		<input type="text" name="name" style="width:200px" ><br />
		価格(S)	価格(M)	価格(L)<br />
		<input type="text" name="price" style="width:50px" >
		<br />
		<!-- ボタンを用意してクリック時は前回のページを表示する。表示は「戻る」-->
		
		ピザフラグ<br />
		<form method="POST" action=pro_add_check.php>
		<select name='flag'>
			<option value='0'>0:全て表示</option>
			<option value='1'>1:宅配のみ表示</option>
			<option value='2'>2:持ち帰りのみ表示</option>
			<option value='3'>3:メニューに表示しない</option>
		</select><br />
		画像を選んでください。<br />
	<input type="file" name="gazou" style=width:400px><br />
	<br />
		<input type="button" onclick="history.back()" value="戻る">
		<!-- 送信用ボタンを用意する。表示は「OK」-->
		<input type="submit" value="ＯＫ">
	</form>
</body>
</html>