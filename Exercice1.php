<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Exercice 1</title>
    </head>
    <link rel="stylesheet" type="text/css" href="resources/style1.css"/>
    </style>
    <body>
    <center>
        <div class="form">
            <h1> Nombres premiers</h1><br>

            <form action="index.php" method ="POST">
            	<label form="num1">Donnez un nombre supérieur a 10000</label><br>
                <input type="text" name="nombre" >
                <br/>

                 <input type="hidden" name="btn" value="exo1" /> 
            	 <input type="submit" name="valider" value="Afficher"  />


            </form>
        </div>
    </center>
    <br><br>
    <?php

        if(isset($_POST['valider']))
        {

                if(!empty($_POST['nombre']))
                {
                    if(preg_match("#^\d+$#", $_POST['nombre']) AND $_POST['nombre']>10000)
                    {
                        $nombre=$_POST['nombre'];
                        $tabPremier=array();
                        $tabPremier []=2;
                        $tabPremier []=3;

                        for($i=5;$i<=$nombre;$i++)
                        {
                            $test=false;
                            if($i%2==0)
                            {
                                $test=true;
                            }
                            else
                            {
                                for($j=2;$j<sqrt($i) && !$test;$j++)
                                {
                                    if($i%$j==0)
                                    {
                                        $test=true;
                                    }
                                }
                            }

                            if(!$test)
                            {
                                $tabPremier[]=$i;
                            }
                        }
                           
                           $tabCleInfSup = tabCle($tabPremier);
                           $tabCleInf=$tabCleInfSup['CleInferieur'];
                           $tabCleSup=$tabCleInfSup['CleSuperieur'];

                            $_SESSION['inf']=$tabCleInfSup['CleInferieur'];
                            $_SESSION['sup']=$tabCleInfSup['CleSuperieur'];
                            $_SESSION["cpinf"]=1;
                            $_SESSION["cpsup"]=1;
                    }
                    else
                    {
                        echo "Ecrivez un nombre supérieur a 10000";
                    }
                }
                else
                {
                    echo "Ecrivez un nombre!";
                }
        }


        /// L'affichage est détaché

        if(isset($_SESSION['inf']) || isset($_GET['inf']) || isset($_GET['sup']))
        { 
                $provInf="inf";
                $provSup="sup";

                //voir  currentpage Inf et currentpage si existe sinon=1
                $cpInf=isset($_SESSION['cpinf'])?$_SESSION['cpinf']:1;
                $cpSup=isset($_SESSION['cpsup'])?$_SESSION['cpsup']:1;


                paginate(isset($_GET['inf'])?$_GET['inf']:$cpInf,$provInf);
                paginate(isset($_GET['sup'])?$_GET['sup']:$cpSup,$provSup);
            
        } 

    ?>
    </body>
</html>
