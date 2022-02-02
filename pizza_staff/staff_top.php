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
<div style="background-color: #00FFFF;">
</div>
ピザ屋管理トップメニュー<br />
<br />
<a href="../pizza_staff/staff_list.php">スタッフ管理</a><br />
<br />
<a href="http://172.22.10.106/pizza/pizza_staff/mst_pizz_list.php">ピザ管理</a><br />
<br/>
<a href="http://172.22.10.118/pizza/pizza_staff/order_list.php">注文一覧</a><br />
<br />
<a href="staff_logout.php">ログアウト</a><br />

</body>
</html>