<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/order_info.css">
    <title>焼き上がり済み</title>
</head>
<body>
    <?php

    try{


        $cust_code=$_GET['cust_code'];

        $dsn = 'mysql:dbname=pizza_store;host=localhost;charset=utf8';
        $user = 'es218';
        $password = 'pass';
        $dbh = new PDO($dsn,$user,$password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        // customerテーブルのcust_ordstateを2(注文を確認)に更新する
        // update テーブル名 set(更新したいカラムの値→)カラム名1=値1,カラム名2=値2,・・・where 検索条件;
        $sql = 'update customer set cust_ordstate=3 where cust_code=?';
        $stmt = $dbh -> prepare($sql);
        $data[]=$cust_code;
        $stmt -> execute($data);

        $dbh = null;
        
    }catch (Exception $e)
    {
        print 'ただいま障害によりご迷惑をお掛けしております。';
        exit();
    }
    ?>
    <div class="info-wrapper">
        <div class="container">
            <h1>焼き上がり済みにしました</h1>
            <button><a href="order_list.php">オーダー一覧へ戻る</a></button>
        </div>
    </div>
</body>
</html>