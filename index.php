<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Serie Algo PHP implémentation</title>
    <link rel="stylesheet" type="text/css" href="resources/styleIndex.css"/>
    <?php require 'resources/fonctionsPhp.php';?>
    </head>
    <body>
            
        <nav class="nav">
                <a href="index.php?page=exo1"><button class="button blue"  > Exercice 1</button></a>
                <a href="index.php?page=exo2"><button class="button blue">  Exercice 2</button></a>
                <a href="index.php?page=exo3"><button class="button blue"> Exercice 3</button></a>
                <a href="index.php?page=exo4"><button class="button blue"> Exercice 4</button></a>
                <a href="index.php?page=exo5"><button class="button blue"> Exercice 5</button></a>
                <a href="index.php?page=app1"><button class="button blue"> Application 1</button></a>
                <a href="index.php?page=app2"><button class="button blue"> Application 2</button></a>
           
        </nav>

            <?php 

            if(isset($_GET['page']))
            {
               // var_dump($_POST);
                $page=$_GET['page'];
                if($page=="exo1")
                {
                include 'Exercice1.php';
                }
                elseif ($page=="exo2") {
                include 'Exercice2.php';
                }
                elseif ($page=="exo3") {
                include 'Exercice3.php';
                }
                elseif ($page=="exo4") {
                include 'Exercice4.php';
                }
                elseif ($page=="exo5") {
                include 'Exercice5.php';
                }
                elseif ($page=="app2") {
                include 'application2/appli2.php';
                }
                elseif ($page=="app1") {
                include 'application1/app1.php';
                }
            }
            else
            {
                include 'Exercice1.php';
            }

            ?>

    </body>
</html>