<?php
    // if(isset($_POST['edit'])==true)
    // {
    //     if(isset($_POST['order_num'])==false){
    //         header('Location:order_ng.php');
    //         exit();
    //     }

    //     // print '修正ボタンが押された';
    //     $order_num=$_POST['order_num'];
    //     header('Location:order_edit.php?order_num='.$order_num);
    //     exit();
    // }

    // if(isset($_POST['delete'])==true)
    // {
    //     if(isset($_POST['order_num'])==false){
    //         header('Location:order_ng.php');
    //         exit();
    //     }
    //     // print 'キャンセルボタンが押された';
    //     $order_num=$_POST['order_num'];
    //     header('Location:order_delete.php?order_num='.$order_num);
    //     exit();
    // }

    // オーダー詳細ボタン
    if(isset($_POST['disp'])==true)
    {
        if(isset($_POST['cust_code'])==false){
            header('Location:order_ng.php');
            exit();
        }
        
        $cust_code=$_POST['cust_code'];
        header('Location:order_disp.php?cust_code='.$cust_code);
        exit();
    }
?>