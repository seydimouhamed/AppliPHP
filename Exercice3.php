        <?php

            $formvalide=false;
            $nombre='';
            $msg="";
            $mots=array();
            $motsErreurs=array();
            $errors=false;
            $nbr_m="";
            $result="";
                if(isset($_POST['envoyer']))
                {   
                    if(empty($_POST['nombre']))
                    {
                        $msg="veuilley entrer une valeur";
                    }
                    elseif(!is_number($_POST['nombre']))
                    {
                        $msg= "veuillez saisir un nombre";
                    }
                    else
                    {   
                        $nombre=$_POST['nombre'];
                        if(!($nombre>=2 && $nombre<=10))
                        {
                            $msg="le nombre doit etre comprise en 2 et 10";
                        }
                        else
                        {

                            $formvalide=true; 


                                for ($i=1; $i <= $nombre; $i++) 
                                { 
                                    if(isset($_POST['nombre'.$i]))
                                    {
                                        $u=$_POST['nombre'.$i];
                                        $u=my_trim($u);
                                        $mots[]=$u; 
                                        if(($er=word_valid($u))!="")
                                        {
                                            $msgError[]=$er;
                                            $errors=true;
                                        }
                                        else
                                        {
                                            $msgError[]="";
                                        }

                                    }

                                }
                                if(!$errors)
                                {
                                    $result=true;
                                    $nbr_m=0;
                                    foreach($mots as $u) 
                                    { 
                                        if(is_char_in_string('m',$u) || is_char_in_string('M',$u))
                                        {
                                            $nbr_m++;
                                        }
                                    }
                                }
                        }
                    }

                }


                function word_valid($ch)
                {
                    $msgError="";
                    if(empty($ch))
                    {
                        $msgError= "le champ ne doit pas etre vide!";
                    }
                    elseif(!is_valid($ch))
                    {
                        $msgError= "le mot n'est pas valide!";
                    }
                    elseif(my_strlen($ch)>20)
                    {
                        $msgError= "le mot est trop long!";
                    }

                    return $msgError;
                }
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Exercice 3</title>
    </head>
    <link rel="stylesheet" type="text/css" href="resources/style3.css"/>
    <body>
    <center>
        <div class="form">
            <h1>Déterminer les mots contenant un M;</h1><br>

            

            <form action="index.php?page=exo3" method ="POST">
                <label form="num1">Donnez le nombre de champs :</label><br>
                <input name="nombre" type="text" value="<?=$nombre ?>"/>
                <small><?=$msg ?></small><br>
                <?php
                    if($formvalide)
                    {
                        for ($i=1; $i <= $nombre; $i++) 
                        { 
                ?>
                    <input type="text" name="nombre<?=$i ?>"  value="<?php if(isset($mots[$i-1])){echo $mots[$i-1];} ?>"><br><small><?php if(isset($msgError[$i-1])){echo $msgError[$i-1];} ?></small><br>
                <?php  
                        }
                    }
                ?>
                <input type="submit" name="envoyer" value="envoyer" />
            </form>
            <?php
                if($result)
                {
                ?>
                        <h1>on a  <b><?=$nbr_m ?></b> contenant la lettre M</h1>
                <?php
                }
            ?>
        </div>
    </center>
    <br><br>
    </body>
</html>