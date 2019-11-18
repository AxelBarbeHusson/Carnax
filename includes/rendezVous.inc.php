<h1>Rendez-Vous</h1>

<?php
if (isset($_POST['rendezVous'])) {
    die("toto");
    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
    $msg = isset($_POST['msg']) ? $_POST['msg'] : "";
    $nom = isset($_POST['USENOM']) ? $_POST['USENOM'] : "";
    $prenom = isset($_POST['USEPRENOM']) ? $_POST['USEPRENOM'] : "";
    $objet = isset($_POST['objet']) ? $_POST['objet'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $postal = isset($_POST['postal']) ? $_POST['postal'] : "";
    $vpostal = isset($_POST['vpostal']) ? $_POST['vpostal'] : "";
    $USER = isset($_POST['USER']) ? $_POST['USER'] : "";
    $erreurs = array();

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        array_push($erreurs, "Veuillez saisir une adresse mail valide.");
    if (count($erreurs) > 0) {

        $message = "<ul>";
        $i = 0;
        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }
        $message .= "</ul>";
        echo $message;

        include "frmRendezvous.php";
    }
    else {
        $sql = "SELECT COUNT(*) FROM carnex WHERE USEMAIL='" . $mail . "'";
        $nombreOccurences = $pdo->query($sql)->fetchColumn();
        if ($nombreOccurences === 0) {
            $sql = "INSERT INTO carnex
                (USEMAIL, USEMESSAGE, USEOBJET, USENOM, ID_USER ,USEPRENOM, USEDATE, USEPHONE, USEVPOSTAL, USEPOSTAL)
                VALUES ('" . $mail . "', '" . $msg . "','" . $objet . "','" . $phone . "','" . $vpostal . "','" . $postal . "','" . $nom . "','" . $date . "','" . $prenom . "','" . $USER . "')";
            die($sql);
            $query = $pdo->prepare($sql);

            $query->bindValue('ID_USER', $USER, PDO::PARAM_STR);
            $query->bindValue('USEMAIL', $mail, PDO::PARAM_STR);
            $query->bindValue('USEPRENOM', $prenom, PDO::PARAM_STR);
            $query->bindValue('USENOM', $nom, PDO::PARAM_STR);
            $query->bindValue('USEMESSAGE', $msg, PDO::PARAM_STR);
            $query->bindValue('USEDATE', $date, PDO::PARAM_STR);
            $query->bindValue('USEPHONE', $phone, PDO::PARAM_STR);
            $query->bindValue('USEOBJET', $objet, PDO::PARAM_STR);
            $query->bindValue('USEVPOSTAL', $vpostal, PDO::PARAM_STR);
            $query->bindValue('USEPOSTAL', $postal, PDO::PARAM_STR);
            $query->execute();
            $message = "Contact pris";
            $sujet = "Validation de votre message";
            $to = 'personne@example.com';
            $subject = $objet;
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
}

else {
    require_once "frmRendezvous.php";
}
