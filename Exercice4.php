<?php

    $texte="";
    $msg="";
    $result="";
    $txt_phrase=array();
    $txt_phrase_sp=array();
    $txt_phrase_valid=array();
        if(isset($_POST['envoyer']))
        {   
            if(empty($_POST['texte']))
            {
                $msg="veuillez écrire un texte";
            }
            else
            {   
                $texte=$_POST['texte'];
                $txt_phrase=texte_to_sentences($_POST['texte']);
                foreach ($txt_phrase as  $t)
                {
                    $txt=trim($t);
                    $txt=remove_space($txt);
                    $txt_phrase_sp[]=$txt;
                    if(is_sentence($txt))
                    {
                        $txt_phrase_valid[]=$txt;
                    }

                }
            }

        }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Exercice4</title>
    </head>
    <link rel="stylesheet" type="text/css" href="resources/style4.css"/>
    <body>
    <center>
        <div class="form">
            <h1>Correction de phrases</h1><br>

            <form action="index.php?page=exo4" method ="POST">
                <label form="num1">Ecrivez le texte :</label><br>
                <textarea name="texte" rows="5" cols="70" ><?=$texte ?></textarea><br>
                <small><?=$msg ?></small><br>


                 <input type="submit" name="envoyer" value="envoyer" />


            </form>

               <?php
                    if($txt_phrase_valid){
                ?>
                  <textarea rows="5" cols="70"><?php foreach($txt_phrase_valid as $p)
                      {
                            echo " $p";
                      }
                      ?></textarea>
                <?php
                    }

               ?>
        </div>
    </center>
    <br><br>
   
    </body>
</html>
