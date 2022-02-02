<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PIZZサイト</title>
        <link rel="stylesheet" href="../css/pizz_cart.css">
        <link rel="stylesheet" href="../css/pizz_css2.css">
        <script src="../javascript/pizz_main.js"></script>
    <style>
        #fom1{
            margin-left:20px;
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
                    <li><a href="pizz_main.html">TOP<br>トップ</a></li>
                    <li><a href="pizz_main.html">ORDER<br>オーダー</a></li>
                </ul>
            </nav>
            </h1>
        </header>
        <div class="wrapper clearfix">
<!-- body内の要素をここから下に書く -->
    <body>

        <?php
            //エラーキャッチ
            try{
                //データベースへ接続する
                // $pdo = new PDO("mysql:host=172.22.10.118; dbname=pizza_store; charset=utf8" , "es218" , "pass");
                $pdo = new PDO("mysql:host=localhost; dbname=pizza_store; charset=utf8" , "es218" , "pass");
                // SQL作成
                $sql = "SELECT pizza_name, pizza_size, price FROM pizza;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                
                //データの取得
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $pizza_name[] = $result;
                $pizza_size[] = $result;
                $price[] = $result;
                }
                
                //もしエラーが発生した時にエラーを表示する
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                }catch(PDOException $e){
                echo $e -> getMessage();
                die();
                }
                //接続を閉じる
                $dbh = null;
                //データ表示
                //print $_SESSION['cart'];
                // print '<br /><br />';
                //print $_SESSION['kazu'];
                // print '<br /><br />';

            $email = $_POST['email'];
            $name = $_POST['name'];
            $postal = $_POST['postal'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $recive = $_POST['recive'];
            $textarea = $_POST['textarea'];

            //オーダーする商品コードと数を仮に入れる
            $cart[] = 10;
            $kazu[] = 1;

            $okflg=true;

            if($name=='')
                {
                    print 'お名前が入力されていません。<br /><br />';
                    $okflg=!$okflg;
                }
            else
                {
                    print '<div id= "fom1"><font size="3" color=black><b>お名前<br />';
                    print $name;
                    print '<br /><br />';
                }

            // if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0)
            //     {
            //         print 'メールアドレスを正確に入力してください。<br /><br />';
            //         $okflg=!$okflg;
            //     }
            // else
            //     {
                    print 'メールアドレス<br />';
                    print $email;
                    print '<br /><br />';
                // }

            if(preg_match('/\A[0-9]+\z/',$postal)==0)
                {
                    print '郵便番号は半角数字で入力してください。<br /><br />';
                    $okflg=!$okflg;
                }
            else
                {
                    print '郵便番号<br />';
                    print $postal;
                    print '<br /><br />';
                }

            if($address=='')
                {
                    print '住所が入力されていません。<br /><br />';
                    $okflg=!$okflg;
                }
            else
                {
                    print '住所<br />';
                    print $address;
                    print '<br /><br />';
                }

            if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel)==0)
                {
                    print '電話番号を正確に入力してください。<br /><br />';
                    $okflg=!$okflg;
                }
            else
                {
                    print '電話番号<br />';
                    print $tel;
                    print '<br /><br />';
                }

            $value = $_POST['recive'];
            if ($value)
                {
                print $value;
                print '<br /><br />';
                }

                if($textarea=='')
                {
                    print '';
                }
            else
                {
                    print 'お届け先備考欄<br />';
                    print $textarea;
                    print '</b></font></div>';
                }

            if($okflg==true)
                {
                    print '<form  method="post" action="pizz_form_done.php">';
                    print '<input type="hidden" name="cart[]" value="'.$cart[0].'">'; 
                    print '<input type="hidden" name="kazu[]" value="'.$kazu[0].'">'; 
                    print '<input type="hidden" name="name" value="'.$name.'">';
                    print '<input type="hidden" name="email" value="'.$email.'">';
                    print '<input type="hidden" name="postal" value="'.$postal.'">';
                    print '<input type="hidden" name="address" value="'.$address.'">';
                    print '<input type="hidden" name="tel" value="'.$tel.'">';
                    print '<input type="hidden" name="recive" value="'.$recive.'">';
                    print '<input type="hidden" name="textarea" value="'.$textarea.'">';
                }

        ?>
        <div class="wrapper clearfix">
            <main class="main1">
            <form method="post" class="h-adr" action="pizz_form_done.php">
                <div class="clearfix">
                <div class="button_wrapper">
                <input type="button" onclick = "history.back()" class="button" value="戻る">
                </div>
                <div class="submit_wrapper">
      <?php if($okflg!=false){  
                print'<input type="submit" class="submit" value="確認">';
      } ?>
                </div>
            </form>
            </main>
        </div>
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
   
    
    <!-- body内の要素をここから上に書く -->
    </body>
</html>
