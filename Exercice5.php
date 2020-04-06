

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Exercice 5</title>
    </head>
    <link rel="stylesheet" type="text/css" href="resources/style5.php"/>
    <body>
    <center>
        <div class="form">
            <h1>Numéros Téléphoniques</h1><br>

            <form action="index.php?page=exo5" method ="POST">
                <label form="texte">Ecrivez le texte :</label><br>
                <textarea name="texte" rows="4" cols="50"><?php
                 if(isset($_POST['texte']))
                {
                echo $_POST['texte'];
                }
                ?></textarea>

                 <input type="hidden" name="btn" value="exo5" /> 
                <input type="submit" name="valider" value="Afficher" />


            </form>
        </div>
    </center>
    <br><br>
    <?php

        if(isset($_POST['valider']))
        {
            $texte=$_POST['texte'];
            if(!empty($texte))
            {
                $tab=explode(" ", $texte);
                $count=count($tab);
                $nbNumOrange=0;
                $nbNumTigo=0;
                $nbNumExpresso=0;
                $nbNumInvalide=0;
                for ($i=0; $i < count($tab) ; $i++)
                { 
                    $n = $tab[$i];
                    if(numValide($n))
                    {
                           if(operator($tab[$i])=="orange")
                           {
                            $nbNumOrange++;
                           } 
                            elseif (operator($tab[$i])=="tigo") {
                                 $nbNumTigo++;
                             } 
                             elseif (operator($tab[$i])=="expresso") {
                                 $nbNumExpresso++;
                             }
                     }
                     else
                     {
                            $nbNumInvalide++;
                     }

                }
                  $pcNumOrange= $nbNumOrange / $count;
                  $pcNumTigo=$nbNumTigo/$count;
                  $pcNumExpresso=$nbNumExpresso/$count;
                  $pcNumInvalide=$nbNumInvalide/$count;
                 echo "Le % de numéro(s) Orange   :<b> $pcNumOrange</b><br>";
                 echo "Le % de numéro(s) Free     :<b> $pcNumTigo</b><br>";
                 echo "Le % de numéro(s) Expresso :<b> $pcNumExpresso</b><br>";
                 echo "Le % de numéro(s) Invalide :<b> $pcNumInvalide</b><br>";
            }
            else
            {
                echo " Ecrivez des mots dans le Champs";
            }
        }


      // function operator($mot)
      // {
      //   if(preg_match("#^77|78#", $mot))
      //   {
      //       return "orange";     
      //   }
      //   elseif (preg_match("#^76#", $mot)) 
      //   {
            
      //       return "tigo";
      //   }
      //   elseif(preg_match("#^70#", $mot))
      //   {
      //       return "expresso";
      //   }
      // }

      // function numValide($num)
      // {
      //   if(preg_match("#\d{9}#", $num))
      //   {
      //       return true;
      //   }

      //   return false;
      // }
    ?>
    </body>
</html>
