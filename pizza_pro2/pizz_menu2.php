<?php
 session_start();    // セッションを開始し、”配達(cart=1)”か”お持ち帰り(cart=2)”を引き連れていく
 if (isset($_SESSION['cart'])==true){
    $cart=$_SESSION['cart'];
    // var_dump($cart);
    // 配列として参照する必要があります
    if ($cart[0] == "1"){
        $otype ="PIZZAサイト(配達)";
    }
    else{
        $otype ="PIZZAサイト(お持ち帰り)";
    }
 }
 else{
     $otype ="PIZZAサイト(SELECT NO)";
 }

 //接続先ホスト名をiniファイルから取得
 if(parse_ini_file("host.ini", true)==false)
 {
     $fmhost='localhost';
 }
 else{
     $ini_array=parse_ini_file("host.ini");
     $fmhost=$ini_array['host'];
 }
	# shopデータベースへの接続
	$dsn='mysql:dbname=pizza_store;host='.$fmhost.';charset=utf8';
	$user='es218';
	$password='pass';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// pizzaテーブルをすべて読取り
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
    // var_dump($pz_cd);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <style>
    header {
        text-align: left;
        /* background-color: skyblue; */
        /* header固定の記述 */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 2;
    }
    #bodyst{
        margin-top:70px; 
    }
    button {
		/* width:100px;			 */
        position:fixed;
        color: white;
        margin-top:80px; 
		margin-left:10px;
        background: red;
        padding: 10px 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
    </style>
        <meta charset="utf-8">
        <!-- <title>PIZZサイト(お持ち帰り)</title> -->
        <?php print '<title>'.$otype.'</title>' ?>

        <link rel="stylesheet" href="../css/base.css">
        <link rel="stylesheet" href="../css/pizz_menu.css">
        <script src="../javascript/jquery-3.4.1.min.js"></script>
        <script src="../javascript/pizz_main.js"></script>
    </head>
    <body>
        <div class="body1">
        <header>
            <nav>
                <ul class="gnav-list-1">
                    <a class="tagu">PiZapoli</a>
                    <li><a href="pizz_main2.html">TOP<br>トップ</a></li>
                    <li><a href="pizz_cart2.php">ORDER<br>オーダー</a></li>
                </ul>
            </nav>
        </header>
        <div class="wrapper clearfix">
<!-- body内の要素をここから下に書く -->

            <main class="main1">

<!-- sessionに格納するため、経由させるphpファイル -->
<form method="post" action="session_menucart.php">
    <button type="submit" name="edit">注文する</button>;
    <div>
        <p class="goods" id="bodyst">・ピザ</p>
    <?php

    print '<ul class="container1">';
    print '<div class="submenu">';
    $pz_nmwk='';
	$cnt=0;
    $yokocnt=0;
    foreach($pz_cd as $key => $val)
	{                    
		if($pz_nmwk == $pz_nm[$key])
        {
            //特に処理がない 
		}
		else{
            $cnt++;
            if($cnt>1)
            {
                print '</ul></li>';
                // 3個表示させた次の表示があれば新たなdivタグ出力
                if($cnt%3==1)
                {
                    print '</div>';
                    print '<div class="submenu">';
                }
            }
            print '<li class="pizza_item1">';
            print '<p class="image">';                     
            if($pz_fl[$key]==''){
                $disp_gazou='';
            }else{
                $disp_gazou='<img src="../img/'.$pz_fl[$key].'" width="320px" height="200px">';
            }
            print $pz_nm[$key];
            print $disp_gazou;
            print '</p>';                
            print '<ul class="hidden">';               
        }
        $dispflg=0;
        switch($pz_df[$key])  
		{   //メニュー表示判定の処理
			case '1':   //1:宅配のみ表示
                if ($cart[0]==1){
                    $dispflg=1; //メニューに表示する
                }
                else{
                    $dispflg=0; //メニューに表示しない
                }
				break;
			case '2':   //2:持帰のみ表示
                if ($cart[0]==1){
                    $dispflg=0;
                }
                else{
                    $dispflg=1;
                }
				break;
			case '3':   //3:非表示
                $dispflg=0;
				break;
			default:    //0:全て表示
               $dispflg=1;
                break;
		}
        if($dispflg==1){
            print '<li>';
            print'<input type="checkbox" name="pizzacode'.$pz_cd[$key].'" value="'.$pz_cd[$key].'">';
            print $pz_sz[$key];
            print '：';
            print $pz_pi[$key];
            print '</li>';
        }
        $pz_nmwk = $pz_nm[$key];
    }
    print '</ul></li>';
    print '</div></ul></div><div></div>';

    ?>
        <p class="goods">・サラダ</p>
                <ul class="container2">
                    <div class="submenu">   <!-- サラダの1列目の範囲 -->
                        <li class="pizza_item2">
                            <p><img src="../img/green salad/salad_640 (1).jpg" alt="サラダ1" width="320px"></p>
                            <ul class="hidden">
                                <li><input type="checkbox">Sサイズ：1100円（税込み）</li>
                                <li><input type="checkbox">Mサイズ：1800円（税込み）</li>
                                <li><input type="checkbox">Lサイズ：2500円（税込み）</li>
                            </ul>
                        </li>
                        <li class="pizza_item2">
                            <p><img src="../img/green salad/salad_640 (2).jpg" alt="サラダ2" width="320px"></p>
                            <ul class="hidden">
                                <li><input type="checkbox">Sサイズ：1100円（税込み）</li>
                                <li><input type="checkbox">Mサイズ：1800円（税込み）</li>
                                <li><input type="checkbox">Lサイズ：2500円（税込み）</li>
                            </ul>
                        </li>
                        <li class="pizza_item2">
                            <p><img src="../img/green salad/salad_640 (3).jpg" alt="サラダ3" width="320px"></p>
                            <ul class="hidden">
                                <li><input type="checkbox">Sサイズ：1100円（税込み）</li>
                                <li><input type="checkbox">Mサイズ：1800円（税込み）</li>
                                <li><input type="checkbox">Lサイズ：2500円（税込み）</li>
                            </ul>
                        </li>
                    </div>
                </ul>
                <p class="goods">・ポテト</p>
                <ul class="container3">
                    <div class="submenu">  <!-- ポテトの1列目の範囲 -->
                        <li class="pizza_item3">
                            <p><img src="../img/poteto/poteto_640.jpg" alt="ポテト1" width="320px"></p>
                            <ul class="hidden">
                                <li><input type="checkbox">Sサイズ：1100円（税込み）</li>
                                <li><input type="checkbox">Mサイズ：1800円（税込み）</li>
                                <li><input type="checkbox">Lサイズ：2500円（税込み）</li>
                            </ul>
                        </li>
                    </div>
                </ul>
                <p class="goods">・ドリンク</p>
                <ul class="container4">
                    <div class="submenu">  <!-- ドリンクの1列目の範囲 -->
                        <li class="pizza_item4">
                        <p><img src="../img/drink/brink.png" alt="ドリンク1" width="320px"></p>
                        <ul class="hidden">
                            <li><input type="checkbox">Sサイズ：1100円（税込み）</li>
                            <li><input type="checkbox">Mサイズ：1800円（税込み）</li>
                            <li><input type="checkbox">Lサイズ：2500円（税込み）</li>
                        </ul>
                    </li>
                    </div>
                </ul>
<input class="chumon" type="submit" value="注文する">
</form>
            </main>

<!-- body内の要素をここから上に書く -->
        </div>
        <footer class="footer">
            <ul class="ashi-list">
                <li class="ashi-item"><a>ABOUT ME</a></li>
                <li class="ashi-item"><a>SITE MAP</a></li>
                <li class="ashi-item"><a>CONTACT</a></li>
            </ul>
            <p class="copyright">Copyright 2021 KADAI SITE</p>
        </footer>
    </div>
    </body>
</html>
