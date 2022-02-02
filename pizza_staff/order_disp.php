<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/disp_style.css">
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">
    <title>オーダー詳細画面</title>
</head>
<body>

    <!-- オーダー詳細画面です -->

    <?php


        try{

            $cust_code=$_GET['cust_code'];

            $dsn = 'mysql:dbname=pizza_store;host=localhost;charset=utf8';
            $user = 'es218';
            $password = 'pass';
            $dbh = new PDO($dsn,$user,$password);
            $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql = 'select * from v_order_pizza where cust_code=?';
            $stmt = $dbh -> prepare($sql);
            $data[]=$cust_code;
            $stmt -> execute($data);

            $dbh = null;

            while(true){

                $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

                    if($rec==false){
                        break;
                    }
                        $order_num=$rec['order_num'];
                        $cust_regdata=$rec['cust_regdate'];
                        $cust_code=$rec['cust_code'];
                        $cust_name[]=$rec['cust_name'];
                        $cust_address=$rec['cust_address'];
                        $cust_tell=$rec['cust_tell'];
                        $cust_ordclass=$rec['cust_ordclass'];
                        $cust_ordstate=$rec['cust_ordstate'];
                        $cust_remarks=$rec['cust_remarks'];
                        $pizza_name[]=$rec['pizza_name'];
                        $pizza_size[]=$rec['pizza_size'];
                        $pizza_kazu[]=$rec['pizza_kazu'];
            }

            $max=count($cust_name);
            // $name_max=count($pizza_name);
            // $size_max=count($pizza_size);
            // $kazu_max=count($pizza_kazu);

            // print $max;
            // print print_r($pizza_name);

            // 画像の表示のさせ方調べる
            // $pizza_gazou=$rec['gazou'];

            // if($pizza_gazou==''){
            //     $disp_gazou='';
            // }else{
            //     $disp_gazou='<img src="'.$pizza_gazou.'">';
            // }


        }catch(Exceprion $e){
            print 'ただいま障害によりご迷惑をお掛けしております';
            exit();
        }
    ?>

    <header>
        <div class="header-logo">
            PiZapoli
        </div>
        <div class="header-nav">
            <ul>
                <li><a href="http://172.22.10.115/pizza/pizza_staff/staff_top.php"><i class="fas fa-home"></i>TOP</a></li>
            </ul>
        </div>
    </header>


        <div class="order-wrapper">
            <div class="container">
                <h1><i class="fas fa-clipboard-list"></i>オーダー詳細画面</h1>
                    <div class="order-num">
                        <h2>注文コード</h2>
                        <p><?php print $cust_code?></p>
                    </div>
            </div>
        </div>

        <div class="pizza-wrapper">
           <div class="container">
               <h2>注文ピザ</h2>
                 <div class="pizza-item-wrapper">
                        <?php 
                        
                            for($i=0;$i<$max;$i++)
                            {
                                print '<div class="pizza-item">';
                                print '<p>ピザの名前:  <span>'.$pizza_name[$i].'<span></p>';
                                print '<p>サイズ:  <span>'.$pizza_size[$i].'</span></p>';
                                print '<p>枚数:  <span>'.$pizza_kazu[$i].'</span></p>';
                                print '</div>';
                            }
                        ?>
                    </div>
            </div>
        </div>

        <div class="cust-wrapper">
            <div class="container">
                <h2>お客様情報</h2>
                    <ul>
                        <li>注文日時:<span><?php print $cust_regdata ?></span></li>
                        <li>お名前:<span><?php print $cust_name[0] ?></span></li>
                        <li>住所:<span><?php print $cust_address ?></span></li>
                        <li>電話番号: <span><?php print $cust_tell ?></span></li>
                        <li>注文区分→1:宅配 2:持ち帰り</li>
                        <li><p><span><?php print $cust_ordclass?></span></p></li>
                    </ul>
            </div>
        </div>

        <div class="remarks-wrapper">
            <div class="container">
                <h2>注文に関するご意見</h2>
                <?php
                    if($cust_remarks=='')
                    {
                        print 'お客様からの意見は特にありません';
                    }else{
                        print '<p><span>'.$cust_remarks.'</span></p>';
                    }
                    
                ?>
            </div>
        </div>

        <div class="order-state">
            <div class="container">
                <h2>注文状態</h2>
                <p>1:注文受け中 2:注文確認済み 3:焼き上がり完了 4:お客様お届け済み 9:完了済み</p>
                <p class="state"><?php print $cust_ordstate ?></p>
            </div>
        </div>
    

    <div class="from-wrapper">
        <div class="container">
            <form action="order_disp_branch.php" method="post" id='form' onsubmit="return beforeSubmit()">
                <input type="hidden" name="cust_code" value="<?php print $cust_code?>">
                <input type="button" onclick="history.back()" value="オーダー一覧へ戻る" class="btn">
                <input type="submit" value="注文を確認済み" name="conf" id="conf" class="btn">
                <input type="submit" value="ピザ焼き上がり済み" name="bake" id="bake" class="btn">
                <input type="submit" value="ピザお届け済み" name="arrived" id="arrived" class="btn">
                <input type="submit" value="お渡し完了" name="fin" id="fin" class="btn">
            </form>
        </div>
    </div>

    <footer>
    </footer>
</body>
<script src="../javascript/order_disp_check.js"></script>
</html>