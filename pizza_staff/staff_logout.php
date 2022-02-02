<?php
session_start();
$_SESSION=array(); #セッション変数を空にする
if(isset($_COOKIE[session_name()])==true)

{
    setcookie(session_name(),'',time()-42000,'/');
}




session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>pizza_store</title>
</head>
<body>

ログアウトしました。<br />
<br />
<a href="http://172.22.10.118/pizza/pizza_staff/staff_loginB.html">ログイン画面へ</a>

</body>
</html>