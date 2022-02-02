<?php
        if(isset($_POST['conf'])==true)
        {
                     
            $cust_code=$_POST['cust_code'];
            header('Location:order_conf_done.php?cust_code='.$cust_code);
            exit();
        }

        if(isset($_POST['bake'])==true)
        {
            
            $cust_code=$_POST['cust_code'];
            header('Location:order_bake_done.php?cust_code='.$cust_code);
            exit();
        }

        if(isset($_POST['arrived'])==true)
        {    
            $cust_code=$_POST['cust_code'];
            header('Location:order_arrived_done.php?cust_code='.$cust_code);
            exit();
        }

        if(isset($_POST['fin'])==true)
        {
                     
            $cust_code=$_POST['cust_code'];
            header('Location:order_fin_done.php?cust_code='.$cust_code);
            exit();
        }





?>