<h1>Connexion</h1>
<?php
/*if (isset($_POST['log'])) {
    if (isset($_POST['pseudo'])) {
        $pseudo = $_POST['pseudo'];
    } else {
        $pseudo = "";
    }
    if (isset($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    } else {
        $mdp = "";
    }
    $erreur = array();
    if (mb_strlen($pseudo) < 2 && ctype_alpha($pseudo)){
        array_push($erreur, "Veuillez saisir votre login.");
        debug($mdp);
    }
    if (mb_strlen($mdp) < 6){
        array_push($erreur, "Votre mot de passe doit comporter au minimum 6 caractères");
    }
    if (count($erreur) >0){
        $msg = "<ul>";
        $i = 0;
        while($i < count($erreur)){
            $msg .= "<li>" . $erreur[$i] . "</li>";
            $i++;
        }
        $msg .= "</ul>";
        echo $msg;
        include "frmLogin.php";
    } else {
        echo "Test matching Log/mdp</br>";
        $getDatas =  "SELECT * FROM carnexadmin WHERE LoginAdmin ='" . $pseudo . "'";
        $result = $pdo->query($getDatas)->fetch(PDO::FETCH_ASSOC);
        $_SESSION['pseudo'] = $result['LoginAdmin'];
        $hash = $result['PasswordAdmin'];
        if (password_verify($mdp, $hash)) {
            $_SESSION['login'] = 1;
            //debug($_SESSION['login']);
            $redirection = "<script>document.location.href='http://localhost/carnex'</script>";
            echo $redirection;
        } else {
            echo "Le login et le mot de passe ne correspondent pas";
        }
    }
} else {
    require_once "frmLogin.php";
}*/
