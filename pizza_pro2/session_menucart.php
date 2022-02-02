<?php
// セッション利用にはsession_startが必須
session_start();
$cart=$_SESSION['cart'];
$max=count($cart);
$cartsv = array();
$kazusv = array();
if(isset($_SESSION['kazu'])==true)
{
	//既に商品選択して、カートを表示させた後
	$kazu=$_SESSION['kazu'];
	if($max>1)
	{
		for ($i=0;$i<$max;$i++)
		{
			if($kazu[$i]>1)
			{
				$cartsv[]=$cart[$i];
				$kazusv[]=$kazu[$i];
			}
		}
	}
}
else{
	$kazu[0]=0; //ここでSESSION格納用の＄KAZU配列を作成
}
# shopデータベースへの接続
//接続先ホスト名をiniファイルから取得
if(parse_ini_file("host.ini", true)==false)
{
	$fmhost='localhost';
}
else{
	$ini_array=parse_ini_file("host.ini");
	$fmhost=$ini_array['host'];
}

$dsn='mysql:dbname=pizza_store;host='.$fmhost.';charset=utf8';
$user='es218';
$password='pass';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// pizzaテーブルよりpizza_codeの最大値を取得
$sql='SELECT MAX(pizza_code) FROM pizza WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();
# shopデータベースから切断する
$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$maxcode = $rec['MAX(pizza_code)'];
$dbh=null;


$cartwk=array();
$kazuwk=array();            
// pizza_codeの最大値数分　チェックされていないか確認
for($i=1;$i<$maxcode+1;$i++)
{
  	if(isset($_POST['pizzacode'.$i])==true){    // チェックされたpizzacodeだけを受け取る
		$cartwk[]=$_POST['pizzacode'.$i];
		$kazuwk[]=1; //とりあえず1を入れる            
	}    
}
// $cart[0],$kazu[0]には宅配か持ち帰りの区分を入れたいので、SESSIONに渡す前に配列の「先頭に挿入
array_splice($cartwk,0,0,$cart[0]);
array_splice($kazuwk,0,0,$cart[0]);

$_SESSION['cart'] = $cartwk;
$_SESSION['kazu'] = $kazuwk;
header('Location: pizz_cart2.php');

?>

