<h1>Rendez-Vous</h1>

<?php
if (isset($_POST['Kontact'])) {
    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
    $msg = isset($_POST['msg']) ? $_POST['msg'] : "";
    $name = isset($_POST['USENOM']) ? $_POST['USENOM'] : "";
    $prenom = isset($_POST['USEPRENOM']) ? $_POST['USEPRENOM'] : "";
    $objet = isset($_POST['objet']) ? $_POST['objet'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
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
    } else {
        $sql = "SELECT COUNT(*) FROM t_carnex WHERE USEMAIL='" . $mail . "'";
        $nombreOccurences = $pdo->query($sql)->fetchColumn();
        if ($nombreOccurences == 0) {
            $sql = "INSERT INTO t_carnex
                (USEMAIL, USEMESSAGE, USEOBJET, USENOM, ID_USER ,USEPRENOM, USEDATE)
                VALUES ('" . $mail . "', '" . $msg . "','" . $objet . "','" . $name . "','" . $date . "','" . $prenom . "','" . $USER . "')";
            $query = $pdo->prepare($sql);
            $query->bindValue('ID_USER', $USER, PDO::PARAM_STR);
            $query->bindValue('USEMAIL', $mail, PDO::PARAM_STR);
            $query->bindValue('USEPRENOM', $prenom, PDO::PARAM_STR);
            $query->bindValue('USENOM', $name, PDO::PARAM_STR);
            $query->bindValue('USEMESSAGE', $msg, PDO::PARAM_STR);
            $query->bindValue('USEDATE', $date, PDO::PARAM_STR);
            $query->bindValue('USEOBJET', $objet, PDO::PARAM_STR);
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
} else {
    require_once "frmRendezvous.php";
}