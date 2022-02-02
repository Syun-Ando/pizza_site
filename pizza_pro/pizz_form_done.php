<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PIZZサイト</title>
        <link rel="stylesheet" href="../css/pizz_cart.css">
        <link rel="stylesheet" href="../css/pizz_css2.css">
        <script src="../javascript/pizz_main.js"></script>
       <!--<link rel="stylesheet" href="./css/base.css"> -->
        <!-- <link rel="stylesheet" href="./css/pizz_form_done.css"> -->
        <!-- <link rel="stylesheet" href="">     body内のcss(デザイン)に使用してください -->
    <style>
        #fom1{
            margin-left:50px;
        }
        #timer{
            font-size: 30px;
            color: blue;
        }
    </style>
    </head>
    <body>
        <div class="body1">
        <header>
            <nav>
                <ul class="gnav-list-1">
                    <a class="tagu">PiZapoli</a>
                    <li><a href="pizz_main.html">TOP<br>トップ</a></li>
                    <li><a href="pizz_cart.php">ORDER<br>オーダー</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <p><font size="4" color=black><b>
                ピザのお届けまで あと<span id="timer"></span>です！
            </b></font></p>
        </main>
        <div class="wrapper clearfix">
    <!-- body内の要素をここから下に書く -->
    <?php
    // とりあえずPOSTで商品コードと数を受け取る 
            // $pizzacode[] = 30; //
            // $pizzakazu[] = 1; //1個
            // $pizzacode[] = 40; //
            // $pizzakazu[] = 1; //1個
            $pizzamai    = mt_rand(1,3);
            for($i=0;$i<$pizzamai;$i++) {
                $pizzacode[] = mt_rand(10,66);
                $pizzakazu[] = 1; //1個
            }           
print $pizzamai;
            $email = $_POST['email'];
            $name = $_POST['name'];
            $postal = $_POST['postal'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $recive = $_POST['recive'];
            $textarea = $_POST['textarea'];
            $demlimethod = 1; //お届け区分　手渡し
            $orddaytm = date("Y/m/d H:i:s");
            $ordclass = 1; //宅配
            $ordstate = 1; //注文受け


            $pdo = new PDO("mysql:host=localhost; dbname=pizza_store; charset=utf8","es218","pass");
            // $pdo = new PDO("mysql:host=172.22.10.118; dbname=pizza_store; charset=utf8" , "es218" , "pass");
    // SQL作成
    $sql = "INSERT INTO customer(cust_email,cust_name,cust_post,cust_address,cust_tell,cust_delimethod
    ,cust_remarks,cust_regdate,cust_ordclass,cust_ordstate) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $data = array();
	$data[] = $email;
	$data[] = $name;
	$data[] = $postal;
	$data[] = $address;
	$data[] = $tel;
	$data[] = $demlimethod;
	$data[] = $textarea;
	$data[] = $orddaytm;
	$data[] = $ordclass;
	$data[] = $ordstate;
    $stmt->execute($data);

    $sql = "SELECT MAX(cust_code) FROM customer WHERE 1";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	$maxcode = $rec['MAX(cust_code)'];

    foreach($pizzacode as $key => $val)
    {
        $sql = "INSERT INTO order_pizza(cust_code,pizza_code,pizza_kazu) VALUES(?,?,?)";
        $stmt = $pdo->prepare($sql);
        $data = array();
        $data[] = $maxcode;
        $data[] = $pizzacode[$key];
        $data[] = $pizzakazu[$key];
        $stmt->execute($data);
    }

    $pizzaname = array();
    $pizzaprice = array();
    $pizzasize = array();
    foreach($pizzacode as $key => $val)
    {
        $sql = "SELECT pizza_name,price,pizza_size FROM pizza WHERE pizza_code=?";
        $stmt = $pdo->prepare($sql);
        $data = array();
        // print $pizzacode[$key];
        $data[] = $pizzacode[$key];
        $stmt->execute($data);
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

        $pizzaname[]=$rec['pizza_name'];
        $pizzaprice[]=$rec['price'];
        $pizzasize[]=$rec['pizza_size'];
    }
	$dbh=null;


    // var_dump($pizzacode);
    

    print '<div id=fom1><font size="4" color=black><b>';
    print $name;
    print'</b></font><font size="3" color=black><b>　さんご購入ありがとうございました。 <br/><br/>';
    print'<font size="6" color=red>注文番号:';
    print $maxcode;
    print'</font><br/>番号をお控えください <br/><br/>';
    print'ご注文商品一覧　<br/>';
    // var_dump($pizzaprice);
    // var_dump($pizzasize);
    foreach($pizzacode as $key => $val)
    {
        print $pizzaname[$key];
        print ',';
        print $pizzaprice[$key];
        print '円,サイズ：';
        print $pizzasize[$key];
        print 'ｘ';
        print $pizzakazu[$key];
        print '個<br/>';
        
    }

    print'<br/>';
    print'手渡し希望 <br/>';
    print'備考 <br/>';
    print $textarea;
    print'<br/><br/>';
    print'キャンセルしたい場合はお電話でお問い合わせください <br/>';
    print'080-0000-0000 <br/>';
    print '</b></font></div>';

    ?>

    <script>
    'use strict';

    function countdown(due) {
        const now = new Date();

        const rest = due.getTime() - now.getTime();
        const sec = Math.floor(rest / 1000) % 60;
        const min = Math.floor(rest / 1000 / 60) % 60;
        const hours = Math.floor(rest / 1000 / 60 / 60) % 24;
        const days = Math.floor(rest / 1000 / 60 / 60 / 24);
        const count = [days, hours, min, sec];

        return count;
    }

    let goal = new Date();
    goal.setMinutes(goal.getMinutes() + 40);


    function recalc() {
        const counter = countdown(goal);
        const time = `${counter[2]}分${counter[3]}秒`;
        document.getElementById('timer').textContent = time;
        refresh();  
    }

    function refresh() {
        setTimeout(recalc, 1000);
    }

    recalc();
    </script>
       

    </body>
</html>
