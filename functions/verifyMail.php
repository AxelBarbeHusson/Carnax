<?php

function verifyMail( string $mail, array  $tableauMails) : bool{
    $domaine = explode('@',$mail);
    $domaine = $domaine[1];

    if (in_array($domaine, $tableauMails))
        return true;
    else
        return false;
}
/*$tab = array ('gmail.com','hotmail.fr', 'wanadoo.fr');
*$mail = 'michel@gmail.com';
 * if (verifyMails($mail, $tab)){
 * echo "Yes";
 * }else{
 * echo "No";
 * }
 */