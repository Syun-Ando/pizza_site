<?php
// session_start();
// session_regenerate_id(true);
// if(isset($_SESSION['login'])==false)
// {
//     print'ログインされていません。<br />';
//     print'<a href="mst_pizz_login.html">ログイン画面へ</a>';
//     exit();
// }
// else
// {
//     print $_SESSION['staff_name'];
//     print '　さんログイン中<br />';
//     print '<br />';
// }

// ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pizza_Store</title>
</head>
<body>

	PHPファイルアップ<br />
	<br />
<!-- POINT:method="post"action=とinput type="submit"はｾｯﾄなのか？ -->
<!-- では、actionを複数指定するにはどうする？ -->


	<form method="post"action="pizz_upto.php"enctype="multipart/form-data">
	<br />
	ファイルを選択 pizza\pizza_pro にアップロードします<br />
		<input type="file"name="gazou"style="width:400px"><br />
		<br />
		<!-- <input type="button"onclick="history.back()"value="戻る"> -->

	<br />
	ファイルを選択 pizza\css にアップロードします<br />
		<input type="file"name="gazou2"style="width:400px"><br />
		<br />
		<!-- <input type="button"onclick="history.back()"value="戻る"> -->

	<br />
	ファイルを選択 pizza\pizza_staff にアップロードします<br />
		<input type="file"name="gazou3"style="width:400px"><br />
		<br />
		<br />
		<br />
		<!-- <input type="button"onclick="history.back()"value="戻る"> -->
		<input type="submit"value="ＯＫ">
	</form>


</body>
</html>