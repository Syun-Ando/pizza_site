<?php
session_start();
try
{
    // セッションで商品コードと数を受け取ります
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    if ($cart[0] == "1"){
        $otype ="PIZZAサイト(配達)";
    }
    else{
        $otype ="PIZZAサイト(お持ち帰り)";
    }
    $max = count($cart);
    var_dump($cart);
    $cartsv=$cart;
    $kazusv=$kazu;
    // $cart[0],$kazu[0]には宅配か持ち帰りの区分が入っているので退避して、とりあえず削除
    array_splice($cart,0,1);
    array_splice($kazu,0,1);

    //接続先ホスト名をiniファイルから取得
    if(parse_ini_file("host.ini", true)==false)
    {
        $fmhost='localhost';
    }
    else{
        $ini_array=parse_ini_file("host.ini");
        $fmhost=$ini_array['host'];
    }
    print $fmhost;
/////////////////////////////////////////////
// 	# shopデータベースへの接続
// 	$dsn='mysql:dbname=pizza_store;host='.$fmhost.';charset=utf8';
// 	$user='es218';
// 	$password='pass';
// 	$dbh=new PDO($dsn,$user,$password);
// 	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// 	// pizzaテーブルをすべて読取り
// 	$sql='SELECT pizza_code,pizza_name,price,gazou,pizza_size,pizza_disp FROM pizza WHERE 1';
// 	$stmt=$dbh->prepare($sql);
// 	$stmt->execute();
// 	# shopデータベースから切断する
// 	$dbh=null;
    // $dsn='mysql:dbname=pizza_store;host='.$fmhost.';charset=utf8';
    // $user='es202';
    // $password='pass';
    // $pdo = new PDO($dsn,$user,$password);
    // $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // foreach($cart as $key => $value)
    // {
    //     $sql = 'SELECT pizza_code,pizza_name,pizza_disp,price,pizza_size FROM pizza WHERE 1';
    //     // $sql = 'SELECT pizza_code,pizza_name,pizza_disp,price,pizza_size FROM pizza WHERE pizza_code=?';
    //     $stmt = $pdo->prepare($sql);
    //     $data[] = $value;
    //     $stmt->execute($data);
    //     $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    //     $pizza_name = $rec['pizza_name'];
    //     $pizza_size = $rec['pizza_size'];
    //     $price = $rec['price'];
    // }
    // $pdo = null;
}
catch(Exception $e)
{
    print'エラー';
    exit();
}
/////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <!-- <title>PIZZAサイト</title> -->
        <?php print '<title>'.$otype.'</title>' ?>
        <link rel="stylesheet" href="../css/pizz_cart.css">
        <link rel="stylesheet" href="../css/pizz_css2.css">
        <!-- <script src="../javascript/pizz_main.js"></script> -->
        <style>
            #total_price {
            border: none;
            cursor: default;
            }
        </style>
    </head>
    <body>
    <div class="body1">
        <header class="header">
            <h1 class="logo1">
            <nav>
                <ul class="gnav-list-1">
                    <a class="tagu">PiZapoli</a>
                    <li><a href="pizz_main2.html">TOP<br>トップ</a></li>
                    <li><a href="#">ORDER<br>オーダー</a></li>
                </ul>
            </nav>
            </h1>
        </header>
        <div class="wrapper clearfix">
            <main class="main1">
                <!-- 個数変更をsessionに入れるため"session_cartform.php"にて処理 -->
                <form method="post" action="session_cartform.php">
                <?php
                // 配達か持ち帰りかを表示
                print '<font size="4" color=black>'.$otype.'</font></br>'; 
                // 合計金額表示 参考->https://dekikotu.com/webtech/jquery-calc-tech/
                print '<div class="form-box">';
                print '<label class="form-label">合計金額：</label>';
                print '<input id="total_price" class="" name="合計金額" style="font-size: 150%; font-weight: bold; display: inline-block;" readonly>';
                print '</div></br>';
      
                try
                {
                    $dsn='mysql:dbname=pizza_store;host='.$fmhost.';charset=utf8';
                    $user='es218';
                    $password='pass';
                    $pdo = new PDO($dsn,$user,$password);
                    $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $totalpay=0;

                    foreach($cart as $key => $value)
                    {
                        $sql = 'SELECT pizza_code,pizza_name,pizza_disp,price,pizza_size FROM pizza WHERE pizza_code=?';
                        $stmt = $pdo->prepare($sql);
                        $data[0] = $value;
                        $stmt->execute($data);
                        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                        $pizza_name = $rec['pizza_name'];
                        $pizza_size = $rec['pizza_size'];
                        $price = $rec['price'];
                        // var_dump($cart);

                        // print '<table class="buy_itemu_menu" data-price="'.$price.'" border=1>';
                        print '<table border=1>';
                        print'<tr>';
                        print'<th>Order　Details</th>';
                        print '<th>小計 :￥';
                        print '<input class="item_price_total" class="" name="小計" value="'.$price*$kazu[$key].'" readonly></th>';
                        // 合計金額を計算しておきます
                        $totalpay=$totalpay+$price*$kazu[$key];
                        print'</tr>';
                        print'<tr>';
                        print'<th>name<br></th>';
                        print '<th>'.$pizza_name.'</th>';
                        print'</tr>';
                        print'<tr>';
                        print'<th>Size<br></th>';
                        // print'<th>'.$pizza_size.'<br></th>';
                        print'<th>'.$pizza_size.'</th>';
                        print'</tr>';
                        print'<tr>';
                        // print'<th>Sheet<br></th>';
                        print'<th>Sheet</th>';
                        print'<th>';
                        print'<div class="buy_itemu_menu" data-price="'.$price.'"></div>';
                        $selno=$key+1;
                        print'<select class="selecty" id="pizza_kazu" name="sel_'.$selno.'">';
                        //formから戻された場合にも変更した個数が１に戻されないように
                        for ($i=1;$i<10;$i++){
                            if($kazu[$key]==$i){
                                print '<option data-num="'.$i.'" value="'.$i.'" selected>'.$i.'</option>';
                            }
                            else{
                                print '<option data-num="'.$i.'" value="'.$i.'">'.$i.'</option>';
                            }
                        }
                        // <option value="1">1</option>
                        // <option value="2">2</option>
                        // <option value="3">3</option>
                        // <option value="4">4</option>
                        // <option value="5">5</option>
                        // <option value="6">6</option>
                        // <option value="7">7</option>
                        // <option value="8">8</option>
                        // <option value="9">9</option>
                        // </select>';
                        print '</select>';
                        print'</th>';
                        print'</tr>';
                        print'<tr>';
                        print'<th>Price</th>';
                        print'<th>'.$price.'</th>';
                        print'</tr>';
                        print'</table>';

                    }
                    $pdo = null;
                    print '<input type="hidden" id="totalpay" value="'.$totalpay.'">';


                }

                catch(Exception $e)
                {
                    print'DBエラー'.$Exception->getMessage();
                    exit();
                }
                // このまま次のformに渡すと変更した個数$_SESSION['kazu']に反映されない
                $_SESSION['cart'] = $cartsv;
                $_SESSION['kazu'] = $kazusv;
                //session_cartfrom.phpで個数変更の処理を入れる
                
                ?>

                <div class="button_wrapper">
                <input type="button" onclick="history.back()" class="button" value="　戻る　">
                </div>
                <div class="submit_wrapper">
                <input type="submit" class="submit" value="注文確定">
                </div>
                </form>
            </main>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    'use strict';
    const totalbox = document.getElementById("totalpay");
    const totalkingaku = totalbox.value;

    $(function() {
    $("select").change(function() {
        var hairetu = [];
        var wk = $(".buy_itemu_menu").length;
        if(wk!=0){
            for(var i = 0; i < $(".buy_itemu_menu").length; i++)
            {
                var item_price = $(".buy_itemu_menu").eq(i).data("price");
                var item_select = $(".buy_itemu_menu").eq(i).next(".selecty").find("option:selected").data("num");
                $(".item_price_total").eq(i).val(item_price * item_select);
                hairetu.push(item_price * item_select);
            }
            
            var total = 0;
            for(var j = 0; j < hairetu.length; j++){
                total += hairetu[j];
            }
            $("#total_price").val(total + "円");
        }
    });
    });


    $(document).ready(function(){
        $("#total_price").val(totalkingaku + "円");
    });

    </script>
    </body>
</html>