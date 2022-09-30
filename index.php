<?php require "./icpayment/session_start.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "./icpayment/head.php"; ?>
        <link rel="icon" href="./img/favicon.jpg">
    </head>
    <body>
        <?php

            if(!isset($_GET['vista']) || $_GET['vista']==""){
                $_GET['vista']="login";
            }


            if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){

                /*== Cerrar sesion ==*/
                if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                    include "./vistas/logout.php";
                    exit();
                }
                if ($_SESSION['usuario'] == "Administrador" or $_SESSION['usuario'] == "amourigan" or $_SESSION['usuario'] == "jperalta"){
                    
                    include "./icpayment/navbar.php";
                    
                }else{

                include "./icpayment/navbar_usuario_estandar.php";
                
                }

                include "./vistas/".$_GET['vista'].".php";

                include "./icpayment/script.php";

            }else{
                if($_GET['vista']=="login"){
                    include "./vistas/login.php";
                }else{
                    include "./vistas/404.php";
                }
            }
        ?>
    </body>
</html>