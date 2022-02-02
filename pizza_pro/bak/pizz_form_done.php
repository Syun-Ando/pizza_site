<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>PIZZサイト</title>
        <!--<link rel="stylesheet" href="./css/base.css"> -->
        <link rel="stylesheet" href="./css/pizz_form_done.css">
        <!-- <link rel="stylesheet" href="">     body内のcss(デザイン)に使用してください -->

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
            <p>
                ピザが出来上がるまで あと<span id="timer"></span>秒です！
            </p>
        </main>
        <div class="wrapper clearfix">
<!-- body内の要素をここから下に書く -->
<?php

print'oooさんご購入ありがとうございました。 <br>';
print'コード番号:';
print $cust_code;
print'番号をお控えください <br>';
print'ご注文商品一覧　<br>';
print'手渡し希望 <br>';
print $recive;
print'<br>';
print'備考 <br>';
print $textarea;
print'<br>';
print'キャンセルしたい場合はお電話でお問い合わせください <br>';
print'080-0000-0000'

?>
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
    <script src="./javascript/pizz_form_done.js"></script>
    </body>
</html>
