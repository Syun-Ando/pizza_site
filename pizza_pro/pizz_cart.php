<?php
session_start();
try
{
//$cart = $_SESSION['cart'];
//$kazu = $_SESSION['kazu'];
//$max = count($cart);
//$pro_pizza_code = $_POST['pizzacode'];
//var_dump($pro_pizza_code);
for($i=1;$i<37;$i++)
    {
        if(isset($_POST['pizzacode'.$i])==true){    // チェックされたpizzacodeだけを受け取る
            $cart[]=$_POST['pizzacode'.$i];
            
        }    
    }

var_dump($cart);
$dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
$user='es202';
$password='pass';
$pdo = new PDO($dsn,$user,$password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
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
}
$pdo = null;
}
catch(Exception $e)
{
    print'エラー';
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PIZZサイト</title>
        <link rel="stylesheet" href="../css/pizz_cart.css">
        <link rel="stylesheet" href="../css/pizz_css2.css">
        <script src="../javascript/pizz_main.js"></script>
    </head>
    <body>
    <div class="body1">
        <header class="header">
            <h1 class="logo1">
            <nav>
                <ul class="gnav-list-1">
                    <a class="tagu">PiZapoli</a>
                    <li><a href="pizz_main.html">TOP<br>トップ</a></li>
                    <li><a href="pizz_cart.php">ORDER<br>オーダー</a></li>
                </ul>
            </nav>
            </h1>
        </header>
        <div class="wrapper clearfix">
            <main class="main1">
                <form method="post" action="pizz_form.html">
                <?php 
                try
                {
                    $dsn='mysql:dbname=pizza_store;host=172.22.10.118;charset=utf8';
                    $user='es202';
                    $password='pass';
                    $pdo = new PDO($dsn,$user,$password);
                    $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
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
                        print '<table border=1>';
                        print'<tr>';
                        print'<th>Order　Details</th>';
                        print '<th>Total :￥'.$price.'円</th>';
                        print'</tr>';
                        print'<tr>';
                        print'<th>name<br></th>';
                        print '<th>'.$pizza_name.'</th>';
                        print'</tr>';
                        print'<tr>';
                        print'<th>Size<br></th>';
                        print'<th>'.$pizza_size.'<br></th>';
                        print'</tr>';
                        print'<tr>';
                        print'<th>Sheet<br></th>';
                        print'<th>';
                        print'
                        <select id = "pizza_kazu">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        </select>';
                        print'</th>';
                        print'</tr>';
                        print'<tr>';
                        print'<th>Price<br></th>';
                        print'<th>'.$price.'<br></th>';
                        print'</tr>';
                        print'</table>';

                    }
                        $pdo = null;
                }

                    catch(Exception $e)
                    {
                        print'エラー';
                        exit();
                    }
                ?>
<!-- <?php foreach($rec as $val){ ?>
    
            <table border=1>
            <tr>
                <th>Order　Details</th>
                <th>Total :￥<?php print 1 * $price;?>円</th>   
            </tr>  
        
       
            <tr>
                <th>name<br></th>
                <th><?php print $pizza_name;?></th>
            </tr>
 
        
            <tr>
                <th>Size<br></th>
                <th><?php print $pizza_size;?><br></th>
            </tr>
        
            <tr>
                <th>Sheet<br></th>
                <th>
                        <select id = "pizza_kazu">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        </select>
                </th>
            </tr> 
        
            <tr>  
                <th>Price<br></th>
                <th><?php print $price;?><br></th>
            </tr>
        
            </table>
<?php } ?> -->
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
    <script>
        'use strict';
    var pizza_kazu = document.getElementById("pizza_kazu");
    pizza_kazu.options[<?php print $rec['pizza_disp'] ?>].selected = true;



    </script>
    </body>
</html>
