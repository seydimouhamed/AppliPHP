<?php $tabCouleur=[
  "lightgreen"=>"vert claire",
  "lightblue"=>"bleu claire",
  "blue"=>"bleu",
  "gold"=>"jaune or",
  "green"=>"vert",
  "orange"=>"orange",
  "lightgray"=>"Gris clair",
  "red"=>"rouge",
  "lightred"=>"rouge claire"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Application 1</title>
    </head>
    <link rel="stylesheet" type="text/css" href="resources/styleApp1.css">
    <script type="text/javascript">
      


      function desactiveOption()
      {
        document.getElementById("lab1").style.backgroundColor="red";
        //couleur1 id du premier select
        //couleur2 id du 2eme select
        var op1=document.getElementById("couleur1").value;//récupére la valeur selectionnée au 1er select;
        document.getElementById("lab1").style.backgroundColor=op1;
        document.getElementById("couleur1").style.color=op1;

        var op = document.getElementById("couleur2");//recupere tout les valeurs du 2eme select;
        for (var i = 0; i < op.length; i++) 
        {
            //opérateur ternaire semblable a if else,
            (op[i].value == op1) ? op[i].disabled = true: op[i].disabled = false;
            
         }
      } 
    document.getElementById("couleur2").addEventListener("change", changeColor(2));
    document.getElementById("couleur1").addEventListener("change", changeColor(1));

      function changeColor(i)
      {
        var c=document.getElementById("couleur"+i).value;
        document.getElementById("lab"+i).style.backgroundColor=c;
        document.getElementById("couleur"+i).style.color=c;

      }

    </script>
    <body onload="changeColor(1);changeColor(2);">


        <div class="form">
            <h1 i> SONATEL ACADEMIE</h1><br>

            <form action="index.php?page=app1" method ="POST">
                <div class="c_white">Taille de la matrice carrée</div>
                <div class="colonne" >
                    <label class="arrondie_left"><center><img src="images/icone1.png"></center></label>
                    <input  class="arrondie_right textfiled1 ct_blue" type="number" min="4" max="20" name="nombre" value="<?php if(isset($_POST['nombre']))
             {
                echo $_POST['nombre'];
                }?>">
                </div>
                <div class="c_white">Select C1</div>
                <div class="colonne" >
                    <label class="arrondie_left c_red" id="lab1" ><center><img src="images/icone2_3.png"></center></label>
                    <select  class="arrondie_right textfiled ct_red" onchange="desactiveOption();changeColor(1);" name="c1" id="couleur1">
                      <?php 
                          foreach ($tabCouleur as $key => $value) 
                          {
                            echo "<option value='$key' ";
                            if(isset($_POST['c1']) && $_POST['c1'] == $key)
                            {
                              echo " selected";
                            }
                            echo ">$value</option>";
                          }
                        ?>
                    </select>
                </div>
                <div class="c_white">Select C2</div>
                <div class="colonne" >
                    <label class="arrondie_left c_green" id="lab2" for="num1"><center><img src="images/icone2_3.png"></center></label>
                    <select  class="arrondie_right textfiled ct_green" name="c2" id="couleur2" onchange="changeColor(2);">
                      <?php 
                          foreach ($tabCouleur as $key => $value) 
                          {
                            echo "<option value='$key'";
                            if(isset($_POST['c2']) && $_POST['c2'] == $key)
                            {
                              echo " selected";
                            }
                            echo ">$value</option>";
                          }
                        ?>
                    </select>
                </div>
                <div class="c_white">Position</div>
                <div class="colonne" >
                    <label class="arrondie_left c_grey" for="num1"><center><img src="images/interrogation.png"></center></label>
                    <select  class="arrondie_right textfiled ct_grey" name="positio" >
                        <option value="haut">Haut</option>
                        <option value="bas">Bas</option>
                    </select>
                </div>


                <input type="hidden" name="btn" value="app1" />
                <div class="btn_container"> <input type="reset" class="btn_annuler" name="annuler" value="Annuler" /> <input type="submit" name="valider"  class="btn_valider" value="Afficher" /></div>


            </form>
        </div>
    <br><br>
    <?php
        if(isset($_POST['valider']))
        {
            $n=$_POST['nombre'];
            $c1=$_POST['c1'];
            $c2=$_POST['c2'];

            $positi=$_POST['positio'];
            if($positi=="haut")
            {
                $ch=$c1;
                $cb=$c2;
            }
            else
            {
                $ch=$c2;
                $cb=$c1;
            }
            echo "<div class=\"width_100\">";
                echo "<table border=\"1px\">";
                for ($i=0; $i <$n ; $i++) 
                {   
                    echo "<tr>";
                    
                    for ($j=0,$k=$n-1; $j < $n,$k>=0 ; $j++,$k--) 
                     { 
                    //     echo"$k <br>";
                        if($j<=$i or $k==$i)
                        {
                            echo "<td style=\" background-color:$ch\"></td>";
                        }
                        else
                        {
                            echo "<td style=\" background-color:$cb\"></td>";
                        }
                    }

                    echo "</tr>";
                }
                echo "</table>";
            echo "</div>";
        }

    ?>
    </body>
</html>
