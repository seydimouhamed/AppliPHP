<?php

  #exercice 1
       function moyenne($tab)
       {
          $somme=0;
            for($i=0 ; $i < sizeof($tab) ;$i++)
            {
                $somme = $somme + $tab[$i];
            }
            $moyenne=$somme / sizeof($tab);
           
            return $moyenne;
       }

       function tabCle($tab)
       {
        $tabCle = array('CleInferieur' => [],'CleSuperieur' => [] );
        $moyen=moyenne($tab);

        for ($i=0; $i < count($tab); $i++)
         { 
            
            if($tab[$i]<$moyen)
            {
              $tabCle['CleInferieur'][]=$tab[$i];
            }
            else
            {
              $tabCle['CleSuperieur'][]=$tab[$i];
            }
        }   
            return $tabCle;       
       }

                 //affichage de 
          function tableauPremier($page=1,$tab)
          {
              $NbrLigne = 0;
            if (count($tab) != 0) 
            {
                            $k = ($page-1)*100; // indice du tableau
                        
                           echo '<table>';
                           echo '<tbody>';
                        
                           for($i=$k;$i<$k+100;$i+=10)
                           {
                               echo"<tr>";
                                for($j=$i;$j<$i+10;$j++)
                                {

                                        // -------------------------c'
                                       if(array_key_exists($j, $tab))
                                        echo "<td>$tab[$j]</td>";
                                        else echo "<td>&nbsp;</td>";
                                        // -------------------------
                                }
                               echo"</tr>";
                           }   
                        
                           echo "</tbody>";
                            echo "</table>";
                     
            } 
            else 
            { 
                echo 'pas de donnée à afficher';
            
            }  
         }


          //fonction de pagination.

        function paginate($param,$prov)//c'est 
         {
            echo '<div class="float">';
            
            $nbPages=ceil(count($_SESSION[$prov])/100);

             tableauPremier($param,$_SESSION[$prov]);
             $cp="cp".$prov;
             $_SESSION[$cp]=$param;
             $precPage=($param-1);
             $suivPage=($param+1);
            echo '<br><center><div class="pagination">';
            if($param>1){echo "<a href='index.php?page=exo1&$prov=$precPage'>&laquo;</a> ";}
            for ($i = 1 ; $i <= $nbPages ; $i++)
            {
                          echo '<a ';
                          if($param==$i){ echo " class='active'";}
                          echo "href='index.php?page=exo1&$prov=$i' > $i  </a>";
            }
          if($param<$nbPages){echo "<a href='index.php?page=exo1&$prov=$suivPage'>&raquo;</a> ";}
            echo "</div></center>";
            echo '</div>';
        }

#-------------------------------------------------------------------------------------------------
        #DEBUT FUNCTIONS EXERCICES 2
#-------------------------------------------------------------------------------------------------
        function afficheTableauCalen($tab)
        {
            echo "<table>";
            $i=1;
            $j=1;
            foreach($tab as $nmois => $strmois)
            {
                if($i==1)
                { 
                    echo "<tr class=\"color$j\">";
                    $j++;
                }
                echo "<td>$nmois</td><td>$strmois</td>";
                if($i==3)
                {
                    echo "</tr>";
                    $i=1;
                }
                else
                {
                    $i++;
                }
            }
            echo "</table>";

        };
        
            $tableauCalendrier=['francais'=>[1=>"janvier",2=>"février",3=>"mars",4=>"avril",5=>"mais",6=>"juin",7=>"juillet",8=>"aout",9=>"septembre",10=>"octobre",11=>"novembre",12=>"décembre"],
                                'anglais'=>[1=>"january",2=>"february",3=>"march",4=>"april",5=>"may",6=>"june",7=>"july",8=>"aguste",9=>"september",10=>"october",11=>"november",12=>"december"]
                ];


#-------------------------------------------------------------------------------------------------
        #DEBUT FUNCTIONS EXERCICES 3
#-------------------------------------------------------------------------------------------------
//faits en cours//
        function is_lower($char)
        {
            return ($char>='a' && $char<='z');
        }


        function is_upper($char)
        {
            return ($char>='A' && $char<='Z');
        }


        function is_number($nbr)
        {
            for ($i=0; $i < my_strlen($nbr); $i++) 
            { 
                if (!(is_entier($nbr[$i]))) 
                {
                    return false;
                }
            }
            return ($nbr>0); 
        } 

        function is_valid($ch)
        {
            for($i=0;$i < my_strlen($ch);$i++)
            {
                if(!(is_upper($ch[$i])) && !(is_lower($ch[$i])))
                {
                    return false;
                }
            }

            return true;
        }

        function is_entier($char)
        {

            return ($char >='0' and $char<='9');    

        }

        function my_strlen($ch)
        {
            for($i=0;isset($ch[$i]);$i++);

                return $i;
        }





        function is_char_in_string($char,$mot){
            for ($i=0; $i < my_strlen($mot); $i++) { 
                if ($mot[$i]==$char) {
                    return true;
                }
            }
            return false;
        } 

        function count_char_in_string($char,$mot){
            $n=0;
            for ($i=0; $i < my_strlen($mot); $i++) { 
                if ($mot[$i]==$char) {
                    $n++; 
                }
            }
            return $n;
        } 


        function my_trim($ch)
        {
            $new_ch="";//nouveau mot sans espace
            for ($i=0; $i < my_strlen($ch); $i++)
             { 
                if($ch[$i]!=" ")
                {
                    $new_ch.=$ch[$i];// $new_ch.=$ch[$i] <=> $new_ch = $new_ch.$ch[$i]
                }                    
            }

            return $new_ch;
        }

//faits en cours//
        function countMots($mots)
        {
            $c=0;
            foreach ($mots as  $value) {
                $c++;
            }
            return $c;
        }

        function contentM($mot)
        {
                for($i=0;isset($mot[$i]);$i++)
                {
                    if($mot[$i]=='M' || $mot[$i]=='m')
                    {
                        return true;
                        break;
                    }
                }

                return false;
        }

            function testLetter($c)
            {
                return (($c>='a' && $c<='z') || ($c>='A' && $c<='Z'));
            }

            function testOtherCaract($c)
            {   
                $caract="éếçàè-ôâûî";
                for ($i=0; isset($caract[$i]); $i++) { 
                    if($c==$caract[$i])
                    {
                        return true;
                        break;
                    }
                }

                return false;
            }

            function motValide($mot)
            {
                for ($i=0; isset($mot[$i]) ; $i++) 
                { 
                    if(!testLetter($mot[$i]) and !testOtherCaract($mot[$i]))
                    {
                        return false;
                        break;
                    }   
                }

                return true;
            }

            function taillemot($mot)
            {
                for($i=0;isset($mot[$i]);$i++);
                return $i;
            }


        function generateChamp($nombre,$mots=array())
        {
            echo "<form action='index.php?page=exo3' method='POST'>";

            for($i=0;$i<$nombre;$i++)
            {
                $msg="";
                if(!empty($mots)){

                    $new_mot=my_trim($mots[$i]);
                    if(empty($new_mot))
                    {
                        $msg="le champ ne doit pas etre vide";
                        $GLOBALS['erreurs']=true;
                    }
                    elseif(!is_valid($new_mot))
                    {
                        $msg="le mot n'est pas valide ";
                        $GLOBALS['erreurs']=true;
                    }
                    elseif(my_strlen($new_mot)>20)
                    {
                        $msg="le mot est trop long";
                        $GLOBALS['erreurs']=true;
                    }
                }
                echo "<input type='text' name='mot[]' value='";
                if(isset($mots[$i])) echo $mots[$i];
                echo"' />  &nbsp; &nbsp; &nbsp;<br>";
                echo "<small style='color:red;'>$msg</small> <br> <br>";
            }
            echo "<input type='hidden' name='nb_champ' value='$nombre'>";
            echo "<input type='submit' name='valider' value='Envoyer'/></form>";
            
        }
#----------------------------------------------------------------------------------------------------
        #FIN FUNCTIONS EXERCICES 3
#----------------------------------------------------------------------------------

		#exervice 5

      function operator($mot)
      {
        if(preg_match("#^77|78#", $mot))
        {
            return "orange";     
        }
        elseif (preg_match("#^76#", $mot)) 
        {
            
            return "tigo";
        }
        elseif(preg_match("#^70#", $mot))
        {
            return "expresso";
        }
      }

      function numValide($num)
      {
        if(preg_match("#\d{9}#", $num))
        {
            return true;
        }

        return false;
      }

#-------------------------------------------------------------------------------------------------
        #DEBUT FUNCTIONS EXERCICES 4
#-------------------------------------------------------------------------------------------------
              function cupSentences($texte)
        {
            $tab=explode(" ", $texte);
            $tabReturn=array();
                $phrase="";
                for($i=0;$i<count($tab);$i++) 
                {

                    $phrase==""?$phrase=$tab[$i] : $phrase=$phrase." ".$tab[$i];
                    if(preg_match("#[.!?]$#", $tab[$i]) && !is_entier($tab[$i+1]))
                    {  
                        $tabReturn[]=$phrase;
                        $phrase="";

                    }
                }

                    return $tabReturn;

        }




                function texte_to_sentences($texte)
                {
                    return preg_split('/(?<=[.?!])\s*(?=[a-z])/i', $texte);
                }

                function remove_space($txt)
                {
                  return preg_replace("/(\s+(?=[\.?!]))|((?<=\s)\s+)|(\s+(?=[’',]))|((?<=[’'])\s)/", "", $txt);
                }

                function is_sentence($ch)
                {
                    $pattern="#^[A-Z].*?[\.?!]$#";
                    return (preg_match($pattern, $ch) && (strlen($ch)<200));
                }


?>