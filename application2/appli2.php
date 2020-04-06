<?php $tabCouleur=[
  "gold"=>"jaune or",
  "lightblue"=>"bleu claire",
  "blue"=>"bleu",
  "green"=>"vert",
  "lightgreen"=>"vert claire",
  "orange"=>"orange",
  "lightgray"=>"Gris clair",
  "red"=>"rouge",
  "lightred"=>"rouge claire"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Application 2</title>
    
    <link rel="stylesheet" type="text/css" href="resources/styleApp1.css">

    <script type="text/javascript">
      var couleur1Des="blue";


      //function change color
      function changeColor(i)
      {
        var c=document.getElementById("couleur"+i).value;
        document.getElementById("lab"+i).style.backgroundColor=c;
        document.getElementById("couleur"+i).style.color=c;

      }

      function desactiveOption2_3()
      {
        //couleur1 id du premier select
        //couleur2 id du 2eme select
        var op1=document.getElementById("couleur1").value;//récupére la valeur selectionnée au 1er select;
        var op2 = document.getElementById("couleur2");//recupere tout les valeurs du 2eme select;
        var op3 = document.getElementById("couleur3");//recupere tout les valeurs du 2eme select;
        for (var i = 0; i < op2.length; i++) 
        {
            //opérateur ternaire semblable a if else,
            if(op2[i].value == op1) 
              { 
                op2[i].disabled = true;
                couleur1Des=op2[i].value;
              }
            else
              { 
                op2[i].disabled = false;
              }
            (op3[i].value == op1) ? op3[i].disabled = true: op3[i].disabled = false;
            
         }
      } 


      function desactiveOption3()
      {
        //couleur1 id du premier select
        //couleur2 id du 2eme select
        var op2=document.getElementById("couleur2").value;//récupére la valeur selectionnée au 1er select;
        var op3 = document.getElementById("couleur3");//recupere tout les valeurs du 2eme select;
        for (var i = 0; i < op2.length; i++) 
        {
            //opérateur ternaire semblable a if else,
            if(op3[i].value == op2 || op3[i].value==couleur1Des)
            {
              op3[i].disabled = true;
            } 
            else
            {
              op3[i].disabled = false;
            } 
            
         }
      } 
    </script>

    </head>
    <body onload="changeColor(1);changeColor(2);changeColor(3)">


        <div class="form">
            <h1> SONATEL ACADEMIE</h1><br>

            <form action="index.php?page=app2" method ="POST">
                <div>Taille de la matrice carrée</div>
                <div class="colonne" >
                    <label class="arrondie_left" for="num1"><center><img src="images/icone1.png"></center></label>
                    <input  class="arrondie_right textfiled" type="number" min="4" max="20" name="nombre" value="<?php if(isset($_POST['nombre']))
             {
                echo $_POST['nombre'];
                }?>" required >
                </div>
                <div>Select C1</div>
                <div class="colonne" >
                    <label class="arrondie_left c_green" id="lab1" ><center><img src="images/icone2_3.png"></center></label>
                    <select  class="arrondie_right textfiled" name="c1" onchange="desactiveOption2_3();changeColor(1);" id="couleur1">
                      <?php 
                          foreach ($tabCouleur as $key => $value) 
                          {
                            echo "<option value='$key'>$value</option>";
                          }
                        ?>
                    </select>
                </div>
                <div>Select C2</div>
                <div class="colonne" >
                    <label class="arrondie_left c_red" id="lab2"  ><center><img src="images/icone2_3.png"></center></label>
                    <select  class="arrondie_right textfiled" name="c2" id="couleur2" onchange="desactiveOption3();changeColor(2);">
                      <?php 
                          foreach ($tabCouleur as $key => $value) 
                          {
                            echo "<option value='$key'>$value</option>";
                          }
                        ?>
                    </select>
                </div>
                <div>Select C3</div>
                <div class="colonne" >
                    <label class="arrondie_left c_yellow"  id="lab3" ><center><img src="images/icone2_3.png"></center></label>
                    <select  class="arrondie_right textfiled" name="c3" id="couleur3" onchange="changeColor(3);">
                        
                      <?php 
                          foreach ($tabCouleur as $key => $value) 
                          {
                            echo "<option value='$key'>$value</option>";
                          }
                        ?>
                    </select>
                </div>
                <div>Position</div>
                <div class="colonne" >
                    <label class="arrondie_left"><center><img src="images/interrogation.png"/></center></label>
                    <select  class="arrondie_right textfiled" name="positio" >
                        <option value="haut">Haut</option>
                        <option value="bas">Bas</option>
                    </select>
                </div>

                <input type="hidden" name="btn" value="app2" />
            	<div class="btn_container"> <input type="submit" class="btn_annuler" name="annuler" value="Annuler" /> <input type="submit" name="valider"  class="btn_valider" value="Afficher" /></div>


            </form>
        </div>
    <br><br>
    <?php

        if(isset($_POST['valider']))
        {
            $n=$_POST['nombre'];
            $c1=$_POST['c1'];
            $c2=$_POST['c2'];
            $c3=$_POST['c3'];
              echo "$c1 , $c2 , $c3 ";
            $positi=$_POST['positio'];
            $ch="";
            $cm="";
            $cb="";
            if($positi=="haut")
            {
                $ch=$c1;
                $cm=$c2;
                $cb=$c3;
            }
            else
            {
                $ch=$c3;
                $cm=$c2;
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
                            if($j==$i or $k==$i or ($i<(($n/2)-1) and $j>$i and $k>$i))
                            {
                                echo "<td style=\" background-color:$ch\">&nbsp;&nbsp;&nbsp;</td>";
                            }
                            elseif($i>(($n/2)-1) and $j<$i and $k<$i)
                            {
                                echo "<td style=\" background-color:$cb\">&nbsp;&nbsp;&nbsp;</td>";
                            }
                            else
                            {
                                echo "<td style=\" background-color:$cm\">&nbsp;&nbsp;&nbsp;</td>";

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
