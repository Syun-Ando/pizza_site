<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/order_list_style.css">
<link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">
<title>オーダーリスト</title>
</head>
<body>

<!-- オーダー一覧画面です -->



<?php

    define('max_view',6);

    try{

        $pdo = new PDO('mysql:dbname=pizza_store;host=localhost;charset=utf8','es218','pass');

    } catch (PDOException $error) {
        //エラーの場合はエラーメッセージを吐き出す
        exit("データベースに接続できませんでした。<br>" . $error->getMessage());
    }

        //必要なページ数を求める
        $count = $pdo->prepare('SELECT COUNT(*) AS count FROM v_order_pizza where not cust_ordstate=9');
        $count->execute();
        $total_count = $count->fetch(PDO::FETCH_ASSOC);
        $pages = ceil($total_count['count'] / max_view);

        //現在いるページのページ番号を取得
        if(!isset($_GET['page_id'])){ 
            $now = 1;
        }else{
            $now = $_GET['page_id'];
        }

        $select = $pdo->prepare("select * from v_order_pizza where not cust_ordstate=9 LIMIT :start,:max;");

        if ($now == 1){
            //1ページ目の処理
                    $select->bindValue(":start",$now -1,PDO::PARAM_INT);
                    $select->bindValue(":max",max_view,PDO::PARAM_INT);
                } else {
            //1ページ目以外の処理
                    $select->bindValue(":start",($now -1 ) * max_view,PDO::PARAM_INT);
                    $select->bindValue(":max",max_view,PDO::PARAM_INT);
                }

        //実行し結果を取り出しておく
        $select->execute();
        $data = $select->fetchAll(PDO::FETCH_ASSOC);
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

    <div class="order-title">
        <div class="container">
            <h1><i class="fas fa-clipboard-list"></i>オーダリスト</h1>
        </div>
    </div>

    <form action="./order_branch.php" method="post">
    
        <?php
        // データベースから表示
        $cu_cdw =0;
            foreach ( $data as $row ) {
                if($cu_cdw ==  $row['cust_code']){
                    
                    print '<div class="container">';
                    print '<p><i class="fas fa-pizza-slice"></i>ピザの種類: <span>'.$row['pizza_name'].'</span></p>';
                    print '<p><i class="fas fa-pizza-slice"></i>ピザのサイズ: <span>'.$row['pizza_size'].'</span></p>';
                    print '<p><i class="fas fa-pizza-slice"></i>ピザの枚数: <span>'.$row['pizza_kazu'].'</span></p>';
                    print '</div>'; 
                }else{
                    $cu_cdw = $row['cust_code'];
                    print '<div class="order-wrapper">';                
                    print '<div class="container">';
                        print '<h2><input type="radio" name="cust_code" value="'.$row['cust_code'].'" id="cust_code">';
                        print '注文コード: <span>'.$row['cust_code'].'</span></h2>';
                        print '<p><i class="fas fa-user-clock"></i>注文日時: <span>'.$row['cust_regdate'].'</span></p>';
                        print '<p><i class="fas fa-user-circle"></i>お名前: <span>'.$row['cust_name'].'  </span>様</p>';
                        print '<p>注文区分: <span>'.$row['cust_ordclass'].'</span></p>';
                        print '<p><i class="fas fa-pizza-slice"></i>ピザの種類: <span>'.$row['pizza_name'].'</span></p>';
                        print '<p><i class="fas fa-pizza-slice"></i>ピザのサイズ: <span>'.$row['pizza_size'].'</span></p>';
                        print '<p><i class="fas fa-pizza-slice"></i>ピザの枚数: <span>'.$row['pizza_kazu'].'</span></p>';
                        print '<p class="cust_ordstate"><i class="fas fa-hourglass-start"></i>注文状態: <span>'.$row['cust_ordstate'].'</span></p>';
                    print '</div>';
                    print '</div>';    
                }
                
            }

            
            print '<div class="form-wrapper">';
            print '<input type="submit" name="disp" value="オーダー詳細" class="btn">';
            print '</div>';
        ?>
    
    </form>

<div class="page-nation-wrapper">
    <div class="container">
        <?php
        //ページネーションを表示
                    for( $n = 1; $n <= $pages; $n ++){
                        if ( $n == $now ){
                            print "<span style='padding: 5px;'>$now</span>";
                        }else{
                            print "<a href='order_list.php?page_id=$n' style='padding: 5px;'>$n</a>";
                        }
                    }
        ?>
        
    </div>
</div>


<footer>

</footer>
</body>
</html>