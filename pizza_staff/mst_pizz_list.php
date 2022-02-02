<?php
session_start();
session_regenerate_id(true);
$_SESSION['login']=1;
$_SESSION['staff_name']='Staff';
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
    print 'Staffさんログイン中<br />';
    print '<br />';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza_Store</title>
<style>
    header {
        text-align: left;
        background-color: skyblue;
        /* header固定の記述 */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 2;
    }
	.hedmenu{
		margin-left:10px;
	}
	h3{
		margin-top:120px;
	}
	#cent{
		background: #CCFFCC;
	}
	#topmu {
		margin-left:300px;
	}
	button {
		/* width:100px;			 */
        color: #fff;
		margin-left:10px;
        background: #5876a3;
        padding: 10px 10px;
        display: inline-block;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
	table{
		margin-left:50px;
    }

</style>		

</head>
<body>
<header>

<?php
try
{
	# shopデータベースへの接続
	$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
	$user='es206';
	$password='pass';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql='SELECT pizza_code,pizza_name,price,gazou,pizza_size,pizza_disp FROM pizza WHERE 1';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	# shopデータベースから切断する
	$dbh=null;

	# 繰り返し処理を行う。
	# while(true)は無限に繰り返し処理を行う（無限ループ）
	//読み込んだ分を配列に格納してから編集して表示させる
	while(true)
	{
		# １つづつレコードを取り出す
		$rec=$stmt->fetch(PDO::FETCH_ASSOC);
		# レコードが無くなった場合の条件分岐
		if($rec==false)
		{
			# 繰り返し処理を終了させる。（無限ループから抜ける）
			break;	
		}
		$pz_cd[]=$rec['pizza_code'];
		$pz_nm[]=$rec['pizza_name'];
		$pz_pi[]=$rec['price'];
		$pz_fl[]=$rec['gazou'];
		$pz_sz[]=$rec['pizza_size'];
		$pz_df[]=$rec['pizza_disp'];
	}
	
	$pz_nmwk = '';
	print '<form method="post" action="mst_pizz_branch.php">';
	print '<h2>　PIZZA 商品管理</h2>';
    print '<div class=hedmenu>';
	print $_SESSION['staff_name'];
    print '　さんログイン中</div>';
	print '<div class=hedmenu><button type="submit" name="add">追加</button>';
	print '<button type="submit" name="edit">修正</button>';
	print '<button type="submit" name="delete" disabled>削除</button>';
	print '<a id="topmu" href="http://172.22.10.115/pizza/pizza_staff/staff_top.php">ピザ屋管理トップへ</a>';
	print '</div>';

?>
</header>

<h3></h3>
<div id="cent">
<?php
	$cnt=0;
	foreach($pz_cd as $key => $val)
	{
		if($pz_nmwk == $pz_nm[$key]){

		}
		else{
			$cnt++;
			if ($cnt == 1){
				print '<input type="radio" name="procode" value="'.$pz_cd[$key].'"checked>';
			}
			else{
				print '</table><br/>';
				print '<input type="radio" name="procode" value="'.$pz_cd[$key].'">';
			}
			print $cnt.'　<b>'.$pz_nm[$key].'</b>　'.$pz_fl[$key].'<br />';
			print '<table border="1">';
			print '<tr><th>SIZE</th><th>PRICE</th><th>DISP</th></tr>';
		}
		print '<tr><td align=center width=50>'.$pz_sz[$key].'</td><td align=right width=80>'.$pz_pi[$key].'円</td>';
		switch($pz_df[$key])
		{
			case '1':
				print '<td align=center width=120>1:宅配のみ表示</td></tr>';
				break;
			case '2':
				print '<td align=center width=120>2:持帰のみ表示</td></tr>';
				break;
			case '3':
				print '<td align=center width=120>3:非表示</td></tr>';
				break;
			default:
				print '<td align=center width=120>0:全て表示</td></tr>';
				break;
		}
		$pz_nmwk = $pz_nm[$key];

	}
	print '</table><br/>';
	# 参照ボタン 追加ボタン 修正ボタン 削除ボタン の追加
	// print '<br/>';
	// print '<input type="submit" name="add" value="追加">';
	// print '<input type="submit" name="edit" value="修正">';
	// print '<input type="submit" name="delete" value="削除">';
	// print '<br/>';
}
catch (Exception $e)	# エラーが発生した場合の処理
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

<br />
<!-- <a href="http://172.22.10.118/pizza/pizza_staff/staff_loginB.html">トップメニューへ</a><br /> -->
</div> 
</body>
</html>
