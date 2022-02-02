<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインされていません。<br />';
    print'<a href="mst_pizz_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    // print $_SESSION['staff_name'];
    print 'Staff';
    print '　さんログイン中<br />';
    print '<br />';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pizza_Store</title>
</head>
<body>

	商品追加<br />
	<br />
<!-- POINT:method="post"action=とinput type="submit"はｾｯﾄなのか？ -->
<!-- では、actionを複数指定するにはどうする？ -->


	<form method="post"action="mst_pizz_add_check.php"enctype="multipart/form-data">
		商品名を入力してください。<br />
		<input type="text"name="name"style="width:300px"><br />
		価格と表示区分を入力してください。<br />
		<span>  S </span>
		<input type="text"name="price[]" style="width:50px">
		<select size="1" name="disp[]">
		    <option selected value="0">0:全て表示</option>
    		<option value="1">1:宅配のみ表示</option>
    		<option value="2">2:持帰のみ表示</option>
    		<option value="3">3:非表示</option>
		</select>
		<br/>
		<span>  M </span>
		<input type="text"name="price[]" style="width:50px">
		<select size="1" name="disp[]">
			<option selected value="0">0:全て表示</option>
    		<option value="1">1:宅配のみ表示</option>
    		<option value="2">2:持帰のみ表示</option>
    		<option value="3">3:非表示</option>
		</select>
		<br/>
		<span>  L </span>
		<input type="text"name="price[]" style="width:50px">
		<select size="1" name="disp[]">
			<option selected value="0">0:全て表示</option>
    		<option value="1">1:宅配のみ表示</option>
    		<option value="2">2:持帰のみ表示</option>
    		<option value="3">3:非表示</option>
		</select>
		<br/>
		<br/>
		画像を選んでください。<br />
		<input type="file"name="gazou"style="width:400px"><br />
		<br />
		<input type="button"onclick="history.back()"value="戻る">
		<input type="submit"value="ＯＫ">
	</form>

</body>
</html>