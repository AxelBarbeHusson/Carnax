<h1>Inscription</h1>
<?php
if (isset($_POST['inscription'])) {
    $login = isset($_POST['login']) ? $_POST['login'] : "";
    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";
    $erreurs = array();
    if (!(mb_strlen($login) >= 2 && ctype_alpha($login)))
        array_push($erreurs, "Veuillez saisir votre login.");
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        array_push($erreurs, "Veuillez saisir une adresse mail valide.");
    if (mb_strlen($mdp) < 6)
        array_push($erreurs, "Votre mot de passe doit comporter 6 caractères minimum");
    if (count($erreurs) > 0) {
        $message = "<ul>";
        $i = 0;
        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }
        $message .= "</ul>";
        echo $message;
        include "frmInscription.php";
    } else {
        $sql = "SELECT COUNT(*) FROM carnexadmin WHERE MailAdmin='" . $mail . "'";
        $nombreOccurences = $pdo->query($sql)->fetchColumn();
        if ($nombreOccurences == 0) {
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            $sql = "INSERT INTO carnexadmin
                (LoginAdmin, PasswordAdmin, MailAdmin)
                VALUES ('" . $login . "', '" . $mdp . "', '" . $mail . "')";
            $query = $pdo->prepare($sql);
            $query->bindValue('IdAdmin', PDO::PARAM_STR);
            $query->bindValue('LoginAdmin', $login, PDO::PARAM_STR);
            $query->bindValue('PasswordAdmin', $mdp, PDO::PARAM_STR);
            $query->bindValue('MailAdmin', $mail, PDO::PARAM_STR);
            $query->execute();
            $msg = "Inscription OK";
            $sujet = "Validation de votre inscription";
            /*$headers = 'From: manu@elysee.fr' . "\r\n" .
                'Reply-To: manu@elysee.fr' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();*/
            if (mail($mail, $sujet, $msg/*, $headers*/)) {
                echo "Inscription OK";
            } else {
                echo "Probleme d'inscription";
            }
        } else {
            echo "Vous êtes déjà dans la BDD";
        }
    }
} else {
    require_once "frmInscription.php";
}
