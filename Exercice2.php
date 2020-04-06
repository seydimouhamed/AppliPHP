<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Exercice 2</title>
    <link rel="stylesheet" type="text/css" href="resources/style2.css"/>
    </head>
        <body>
    <center>
        <div class="form">
            <h1>Calendrier</h1><br>

            <form action="index.php?page=exo2" method ="POST">
            	<label form="num1">Choisisez la langue</label><br>
                <select name="langue">
                    <option value="fr">Francais</option>
                    <option value="en">Anglais</option>
                </select>

                <input type="hidden" name="btn" value="exo2" />
            	 <input type="submit" name="valider" value="Afficher" />


            </form>
        </div>
    </center>
    <br><br>
    <?php

        if(isset($_POST['valider']))
        {

                if(isset($_POST['langue']))
                {
                    $langue=$_POST['langue'];
                    if($langue=="fr")
                    {
                        $tabfrancais=$tableauCalendrier['francais'];
                        afficheTableauCalen($tabfrancais);
                    }
                    elseif ($langue=="en") 
                    {
                        $tabAnglais=$tableauCalendrier['anglais'];
                        afficheTableauCalen($tabAnglais);
                    }
                }

        }

    ?>
    </body>
</html>
