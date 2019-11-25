<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
        $bonjour = $_SESSION['prenom'] . " " . $_SESSION['nom'];
    }
} else {
    unset($bonjour);
}
?>
<body>

<header class="page-header">
    <div class="wrap">
        <div class="linear-gradient">
            <h1>Les Vaccins du Bonheur</h1>
        </div>
        <img id="logo" src="assets/img/logov2.png" alt="logo">


        <nav>
            <ul class="nav navbar">
                <li><a href="index.php?page=acceuil">Home</a></li>
                <li><a href="index.php?page=rendezVous" title="">Rendez-vous</a></li>
                <li><a href="index.php?page=etatvaccins" title="">Etat Vaccins</a></li>
                <li><a href="index.php?page=vaccinspourvoyage" title="">Vaccins pour voyages</a></li>
                <a target="_blank"
                   href="https://solidarites-sante.gouv.fr/IMG/pdf/calendrier_vaccinal_maj_17avril2019.pdf">Liens
                    vaccins</a>
                <button class="log-button login" onclick="popupButton()">Login</button>
                <button class="log-button register"><a href="index.php?page=inscriptions">Inscription</a></button>
            </ul>
        </nav>
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            echo "<li class=\"nav-item\"><a href=\"index.php?page=rendezvous\" class=\"nav-link js-scroll-trigger\">Rendez-vous</a></li>";
            echo "<li class=\"nav-item\"><a href=\"index.php?page=logout\" class=\"nav-link js-scroll-trigger\">Logout</a></li>";
        } else {
            if (isset($_POST['inscr'])) {
                $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
                $sql = "SELECT COUNT(*) FROM carnaxadmin WHERE MailAdmin='" . $mail . "'";
                if (idAdmin <= 1) {
                    echo "<li class=\"nav-item\"><a href=\"index.php?page=inscriptions\" class=\"nav-link js-scroll-trigger\">Inscription</a></li>";
                }
            }
        }
        ?>
    </div>

    <div class="clear"></div>
    <?php
    if (isset($_POST['barnabe'])) {
        $mail = isset($_POST['mail']) ? clean($_POST['mail']) : "";
        $mdp = isset($_POST['mdp']) ? clean($_POST['mdp']) : "";
        $erreurs = array();
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
            //include "frmLogin.php";
        } else {
            echo "Test matching login/password";
            $getDatas = "SELECT * FROM t_users WHERE USEMAIL='" . $mail . "'";
            $result = $pdo->query($getDatas)->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nom'] = $result['USENOM'];
            $_SESSION['prenom'] = $result['USEPRENOM'];
            $hash = $result['USEPASSWORD'];
            if (password_verify($mdp, $hash)) {
                $_SESSION['login'] == 1;
                $redirection = "<script>document.location.href='http://localhost/carnex'</script>";
                echo "Vous êtes maintenant connecté";
            } else {
                echo "L'adresse et le mot de passe ne correspondent pas !";
            }
            /*$mdp = password_verify($mdp, $hash);
            $sql = "SELECT COUNT(*) FROM t_users WHERE USEMAIL='". $mail . "' AND USEPASSWORD ='" . $mdp . "''";
            $nombreOccurences = $pdo->query($sql)->fetchColumn();*/
        }
    } //else {
    //require_once "frmLogin.php";
    if (!isset($mail)) $mail = "";
    if (!isset($mdp)) $mdp = "";
    ?>
    <!-- <form method="post" action="index.php?page=login">
                <div>
                    <label for="mail">Mail&nbsp;: </label>
                    <input type="text" id="mail" name="mail" value="<?= $mail ?>"/>
                </div>
                <div>
                    <label for="mdp">Mot de passe&nbsp;: </label>
                    <input type="password" id="mdp" name="mdp"/>
                </div>
                <div>
                    <input type="reset" value="Effacer"/>
                    <input type="submit" value="Envoyer"/>
                </div>
                <input type="hidden" name="barnabe"/>
            </form>-->
    <div class="form-popup" id="loginForm">
        <form method="post" action="#" class="form-wrap">
            <h1>Login</h1>
            <label for="mail"><b>Email :</b></label>
            <input type="text" placeholder="Entrez votre Email" id="mail" name="mail" required value="<?= $mail ?>">
            <label for="mdp"><b>Mot de passe :</b></label>
            <input type="password" placeholder="Saisir le mot de passe" id="mdp" value="<?= $mdp ?>" name="mdp"
                   required>
            <button type="submit" class="btn" type="submit">Login</button>
            <button type="button" class="btn cancel" type="reset" onclick="closeButton()">Fermer</button>
            <input type="hidden" name="barnabe"/>
        </form>
    </div>

    <script>
        function popupButton() {
            document.getElementById("loginForm").style.display = "block";
        }

        function closeButton() {
            document.getElementById("loginForm").style.display = "none";
        }
    </script>
    </div>
    </section>
    </div>

</header>
<div>