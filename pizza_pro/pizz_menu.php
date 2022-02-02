<?php
 session_start();    // セッションを開始し、”配達(cart=1)”か”お持ち帰り(cart=2)”を引き連れていく
 
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PIZZサイト(お持ち帰り)</title>
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
                    <li><a href="pizz_main.html">TOP<br>トップ</a></li>
                    <li><a href="pizz_cart.php">ORDER<br>オーダー</a></li>
                </ul>
            </nav>
        </header>
        <div class="wrapper clearfix">
<!-- body内の要素をここから下に書く -->

            <main class="main1">

<form method="post" action="pizz_cart.php">
                <div>
                    <p class="goods">・ピザ</p>
                <ul class="container1">
                    <div class="submenu">               <!-- 1列目の範囲 -->
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';  // 注意：左上のツールバーの「編集」→「置換」から”es218”を”es2○○(○○は出席番号)”に全て置き換えて使用してください。
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data[] = 10;
                                        $stmt->execute($data);
                                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                        $pro_pizza_name=$rec['pizza_name'];
                                        $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';

                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=10;
                                        $stmt->execute($data);
                                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                        $pro_pizza_code=$rec['pizza_code'];
                                        $pro_pizza_size=$rec['pizza_size'];
                                        $pro_price=$rec['price'];
                                        $dbh=null;

                                        print'<input type="checkbox" name="pizzacode1" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';

                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=11;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;

                                        print'<input type="checkbox" name="pizzacode2" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        var_dump($e);
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=12;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;

                                        print'<input type="checkbox" name="pizzacode3" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=46;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';

                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=46;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;

                                        print'<input type="checkbox" name="pizzacode4" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';

                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=47;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode5" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';

                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=48;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode6" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=16;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=16;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode7" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=17;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode8" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=18;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode9" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div class="submenu">               <!-- 2列目の範囲 -->
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';  // 注意：左上のツールバーの「編集」→「置換」から”es218”を”es2○○(○○は出席番号)”に全て置き換えて使用してください。
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[] = 19;
                                        $stmt->execute($data);
                                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                        $pro_pizza_name=$rec['pizza_name'];
                                        $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=19;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode10" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=20;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode11" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=21;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode12" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=22;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=22;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode13" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=23;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode14" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=24;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode15" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=25;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=25;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode16" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=26;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode17" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=27;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode18" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div class="submenu">               <!-- 3列目の範囲 -->
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';  // 注意：左上のツールバーの「編集」→「置換」から”es218”を”es2○○(○○は出席番号)”に全て置き換えて使用してください。
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[] = 28;
                                        $stmt->execute($data);
                                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                        $pro_pizza_name=$rec['pizza_name'];
                                        $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=28;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode19" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=29;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode20" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=30;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode21" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=31;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=31;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode22" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=32;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode23" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=33;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode24" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=34;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=34;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;

                                        print'<input type="checkbox" name="pizzacode25" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=35;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode26" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=36;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode27" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div class="submenu">               <!-- 4列目の範囲 -->
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';  // 注意：左上のツールバーの「編集」→「置換」から”es218”を”es2○○(○○は出席番号)”に全て置き換えて使用してください。
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[] = 37;
                                        $stmt->execute($data);
                                        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                        $pro_pizza_name=$rec['pizza_name'];
                                        $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=37;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode28" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=38;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode29" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=39;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode30" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=40;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=40;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode31" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=41;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode32" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=42;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode33" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                        <li class="pizza_item1">
                            <p class="image">
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_name,gazou FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=43;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_name=$rec['pizza_name'];
                                            $pro_gazou_name=$rec['gazou'];
                                        $dbh =null;

                                            if($pro_gazou_name==''){
                                                $disp_gazou='';
                                            }else{
                                                $disp_gazou='<img src="../img/'.$pro_gazou_name.'" width="320px">';
                                            }
                                        print $pro_pizza_name;
                                        print $disp_gazou;
                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                            </p>
                            <ul class="hidden">
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=43;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode34" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=44;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;


                                        print'<input type="checkbox" name="pizzacode35" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                                <li>
                                <?php
                                    try
                                    {
                                        $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                                        $user='es218';
                                        $password='pass';
                                        $dbh=new PDO($dsn,$user,$password);
                                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                                        $sql='SELECT pizza_code,pizza_size,price FROM pizza WHERE pizza_code=?';
                                        $stmt=$dbh->prepare($sql);
                                        $data = array();
                                        $data[]=45;
                                        $stmt->execute($data);
                                            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $pro_pizza_code=$rec['pizza_code'];
                                            $pro_pizza_size=$rec['pizza_size'];
                                            $pro_price=$rec['price'];
                                        $dbh=null;

                                        print'<input type="checkbox" name="pizzacode36" value="'.$pro_pizza_code.'">';
                                        print $pro_pizza_size;
                                        print '：';
                                        print $pro_price;

                                    }
                                    catch (Exception $e)
                                    {
                                        print 'ただいま障害により大変ご迷惑をお掛けしております。';
                                        exit();
                                    }
                                ?>
                                </li>
                            </ul>
                        </li>
                    </div>
                </ul>
                </div>
                <div></div>
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
