<?php
session_start();
session_regenerate_id(true);
// if(isset($_SESSION['login'])==false)
// {
//     print'ログインされていません。<br />';
//     print'<a href="mst_pizz_login.html">ログイン画面へ</a>';
//     exit();
// }
// else
// {
    // print $_SESSION['staff_name'];
    print 'Staff';
    print '　さんログイン中<br />';
    print '<br />';
// }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pizza_Store</title>
</head>
<body>

<?php

try
{

$pro_code=$_GET['procode'];
# shopデータベースへの接続
$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
$user='es206';
$password='pass';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
# $pro_codeはSML先頭のpizza_codeをｾｯﾄ
$sql='SELECT pizza_name FROM pizza WHERE pizza_code=?';
$stmt=$dbh->prepare($sql);
$data[0]=$pro_code;
$stmt->execute($data);
# データベースの検索結果をpro_nameに格納する。
$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pz_name=$rec['pizza_name'];
// $pro_price=$rec['price'];
// $pro_gazou_name_old=$rec['gazou'];
# shopデータベースから切断する
$sql='SELECT pizza_code,pizza_name,price,gazou,pizza_size,pizza_disp FROM pizza WHERE pizza_name=?';
$stmt=$dbh->prepare($sql);
$data[0]=$pz_name;
$stmt->execute($data);
$dbh =null;  
$piz_gazou_name_old ='';//gazou名を入力ありの先頭データのみ格納する
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
    if($rec['gazou']!='' && $piz_gazou_name_old=='')
    {
        $piz_gazou_name_old=$rec['gazou'];
    }
    $pz_sz[]=$rec['pizza_size'];
	$pz_df[]=$rec['pizza_disp'];
}
// select要素で現在の設定をデフォルト表示させる
for ($i=0;$i<4;$i++){
    if($i==$pz_df[0]){
        $pz_fl1[$i]='selected';
    }
    else{
        $pz_fl1[$i]='';
    }
}
for ($i=0;$i<4;$i++){
    if($i==$pz_df[1]){
        $pz_fl2[$i]='selected';
    }
    else{
        $pz_fl2[$i]='';
    }
}
for ($i=0;$i<4;$i++){
    if($i==$pz_df[2]){
        $pz_fl3[$i]='selected';
    }
    else{
        $pz_fl3[$i]='';
    }
}

if($piz_gazou_name_old=='')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="../img/'.$piz_gazou_name_old.'" width="40%" height="AUTO">';
}

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

PIZZA商品修正<br />
<br />
<?php // var_dump($pz_fl1); ?>

商品コード<br />
<?php print $pz_cd[0].','; ?>
<?php print $pz_cd[1].','; ?>
<?php print $pz_cd[2]; ?>
<br />
<br />
<form method="post" action="mst_pizz_edit_check.php"enctype="multipart/form-data">
<input type="hidden" name="code[]" value="<?php print $pz_cd[0]; ?>">
<input type="hidden" name="code[]" value="<?php print $pz_cd[1]; ?>">
<input type="hidden" name="code[]" value="<?php print $pz_cd[2]; ?>">
<input type="hidden" name="gazou_name_old" value="<?php print $piz_gazou_name_old; ?>">

商品名<br />
<font size="3" color="gray"><?php print $pz_nm[0]; ?></font><br />
<input type=text name="name" style="width:300px"  value="<?php print $pz_nm[0]; ?>"><br / >
<br />
<span>  価格</span><br />
<span>  S </span>
<font size="2" color="gray"><?php print $pz_pi[0]; ?></font>
<input type=text name="price[]" style="width:50px"  value="<?php print $pz_pi[0]; ?>">円
<font size="2" color="gray"><?php print $pz_df[0]; ?></font>
<select size="1" name="disp[]">
    <option <?php print $pz_fl1[0]; ?> value="0">0:全て表示</option>
    <option <?php print $pz_fl1[1]; ?> value="1">1:宅配のみ表示</option>
    <option <?php print $pz_fl1[2]; ?> value="2">2:持帰のみ表示</option>
    <option <?php print $pz_fl1[3]; ?> value="3">3:非表示</option>
</select>
<br/>
<span>  M </span>
<font size="2" color="gray"><?php print $pz_pi[1]; ?></font>
<input type=text name="price[]" style="width:50px"  value="<?php print $pz_pi[1]; ?>">円
<font size="2" color="gray"><?php print $pz_df[1]; ?></font>
<select size="1" name="disp[]">
    <option <?php print $pz_fl2[0]; ?> value="0">0:全て表示</option>
    <option <?php print $pz_fl2[1]; ?> value="1">1:宅配のみ表示</option>
    <option <?php print $pz_fl2[2]; ?> value="2">2:持帰のみ表示</option>
    <option <?php print $pz_fl2[3]; ?> value="3">3:非表示</option>
</select>
<br/>
<span>  L </span>
<font size="2" color="gray"><?php print $pz_pi[2]; ?></font>
<input type=text name="price[]" style="width:50px"  value="<?php print $pz_pi[2]; ?>">円
<font size="2" color="gray"><?php print $pz_df[2]; ?></font>
<select size="1" name="disp[]">
    <option <?php print $pz_fl3[0]; ?> value="0">0:全て表示</option>
    <option <?php print $pz_fl3[1]; ?> value="1">1:宅配のみ表示</option>
    <option <?php print $pz_fl3[2]; ?> value="2">2:持帰のみ表示</option>
    <option <?php print $pz_fl3[3]; ?> value="3">3:非表示</option>
</select>
<br/>
<br/>
<font size="2" color="gray"><?php print $piz_gazou_name_old; ?></font><br/>
<?php print $disp_gazou;?>
<br />
画像を選んでください。<br />
<input type="file"name="gazou"style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>