<?php
function pagination($tab,$nombreDeMessagesParPage){
// On met dans une variable le nombre de messages qu'on veut par page
$nombreDeMessagesParPage = 100; // Essayez de changer ce nombre pour voir :o)
// On récupère le nombre total de messages

$totalDesMessages = count($tab);
// On calcule le nombre de pages à créer
$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo '</br> Page : ';
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
  echo '<a href="pagination.php?page=' . $i . '">' . $i . '</a> ';
?>

<?php
$NbrLigne = 0;
if (count($tab) != 0) 
{
    $k = 0; // indice du tableau
?>
    <table border="1">
    <tbody>
<?php 
    while ($k < 100) 
    {
        if (($k+1)%20 == 1) 
        {
            $NbrLigne++;
            $fintr = 0;
?>
        <tr>
<?php
        }
?>
            <td>
<?php
            // -------------------------
            // DONNÉES À AFFICHER dans la cellule
            echo $tab[$k];
            // -------------------------
?>
            </td>
<?php
        if (($k+1)%20 == 0) {
            $fintr = 1;
?>        </tr>
<?php
        }
        $k++;
    }   
    // fermeture dernière balise /tr
    if ($fintr!=1) {
?>        </tr>
<?php
 } 
?>
    </tbody>
    </table>
<?php
} else { ?>
    pas de donnée à afficher
<?php
}   }
?>



<?php
}
?>