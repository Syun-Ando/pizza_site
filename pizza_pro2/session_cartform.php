<?php
// セッション利用にはsession_startが必須
session_start();
$cart=$_SESSION['cart'];
$kazu=$_SESSION['kazu'];
$max=count($cart);
$cartsv = $cart;
$kazusv = $kazu;
// if(isset($_SESSION['kazu'])==true)
// {
// 	//既に商品選択して、カートを表示させた後
// 	$kazu=$_SESSION['kazu'];
// 	if($max>1)
// 	{
// 		for ($i=0;$i<$max;$i++)
// 		{
// 			if($kazu[$i]>1)
// 			{
// 				$cartsv[]=$cart[$i];
// 				$kazusv[]=$kazu[$i];
// 			}
// 		}
// 	}
// }
// else{
// 	$kazu[0]=0; //ここでSESSION格納用の＄KAZU配列を作成
// }
$kazusv[0]=0;
foreach($cart as $key => $value)
{
    // $cart[0],$kazu[0]には宅配か持ち帰りの区分が入っているので無視する
	if($key!=0)
	{
		if(isset($_POST['sel_'.$key])==true)
		{
			$kswk=$_POST['sel_'.$key];
			// if($kswk > 1)
			// {
				$kazusv[$key]=$_POST['sel_'.$key];
			// }
		}
	}

}

$_SESSION['cart'] = $cartsv;
$_SESSION['kazu'] = $kazusv;
header('Location: pizz_form2.html');

?>

