<h1>Test</h1>

<?php

if (isset($_POST['test'])) {

    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
    $msg = isset($_POST['msg']) ? $_POST['msg'] : "";
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $prenom  = isset($_POST['prenom']) ? $_POST['prenom'] : "";
    $sujet = isset($_POST['sujet']) ? $_POST['sujet'] : "";
    $apostal = isset($_POST['apostal']) ? $_POST['apostal'] : "";
    $cpostal = isset($_POST['cpostal']) ? $_POST['cpostal'] : "";
    $ville = isset($_POST['ville']) ? $_POST['ville'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
    $USER = isset($_POST['USER']) ? $_POST['USER'] : "";
    $erreurs = array();
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        array_push($erreurs, "Veuillez saisir une adresse mail valide.");
    if (!(mb_strlen($nom) >= 2 && ctype_alpha($nom)))
        array_push($erreurs, "Veuillez saisir un nom correct.");
    if (!(mb_strlen($prenom ) >= 2 && ctype_alpha($prenom)))
        array_push($erreurs, "Veuillez saisir un prénom correct.");
    if (count($erreurs) > 0) {
        $message = "<ul>";
        $i = 0;
        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }
        $message .= "</ul>";
        echo $message;
        include "frmTest.php";
    } else {
        $sql = "SELECT COUNT(*) FROM t_test WHERE USEMAIL='" . $mail . "'";
        $nombreOccurences = $pdo->query($sql)->fetchColumn();
        if ($nombreOccurences == 0) {
            $sql = "INSERT INTO t_test
                (USEMAIL, USEMESSAGE, USESUJET, USENOM, ID_USER , USEPRENOM, USEAPOSTAL, USECPOSTAL, USEVILLE, USEPHONE, USEDATE)
                VALUES ('" . $mail . "', '" . $msg . "','" . $sujet . "','" . $nom . "','" . $USER . "','" . $prenom  . "','" . $apostal . "','" . $cpostal . "','" . $ville . "','" . $phone . "','" . $date . "')";
            $query = $pdo->prepare($sql);
            $query->bindValue('ID_USER', $USER, PDO::PARAM_STR);
            $query->bindValue('USEMAIL', $mail, PDO::PARAM_STR);
            $query->bindValue('USEPRENOM', $prenom , PDO::PARAM_STR);
            $query->bindValue('USENOM', $nom, PDO::PARAM_STR);
            $query->bindValue('USEMESSAGE', $msg, PDO::PARAM_STR);
            $query->bindValue('USESUJET', $sujet, PDO::PARAM_STR);
            $query->bindValue('USEAPOSTAL', $apostal, PDO::PARAM_STR);
            $query->bindValue('USECPOSTAL', $cpostal, PDO::PARAM_STR);
            $query->bindValue('USEVILLE', $ville, PDO::PARAM_STR);
            $query->bindValue('USEPHONE', $phone, PDO::PARAM_STR);
            $query->bindValue('USEDATE', $date, PDO::PARAM_STR);
            $query->execute();
            $message = "Contact pris";
            $sujet = "Validation de votre message";
            $to = 'personne@example.com';
            $subject = $sujet;
            $message = $msg;
            $headers = 'From:' . $mail . "\r\n" .
                'Reply-To:' . $mail . "\r\n" .
                'X-Mailer: PHP/' . phpversion() .
                'Content-Type: text/html: charset=utf-8';
            mail($to, $subject, $message);
        } else {
            echo "Vous avez déjà pris contact";
        }
    }
} else {
    require_once "frmTest.php";
}
