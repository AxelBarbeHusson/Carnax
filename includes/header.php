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

    <h1>Carnax</h1>
    <div id="page-title">
        <nav>
            <ul class="nav-navbar">
                <li><a href="index.php?page=acceuil ">Home</a></li>
                <li><a href="index.php?page=rendezvous" title="">Rendez-vous</a></li>
                <li><a href="index.php?page=etatvaccins" title="">Etat Vaccins</a></li>
                <li><a href="index.php?page=vaccinspourvoyage" title="">Vaccins pour voyages</a></li>
                <li><a href="index.php?page=inscription" title="">Inscriptions</a></li>

                <a target="_blank" href="https://solidarites-sante.gouv.fr/IMG/pdf/calendrier_vaccinal_maj_17avril2019.pdf">Liens vaccins.</a>
            </ul>
        </nav>
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            echo "<li class=\"nav-item\"><a href=\"index.php?page=rendezvous\" class=\"nav-link js-scroll-trigger\">Rendez-vous</a></li>";
            echo "<li class=\"nav-item\"><a href=\"index.php?page=logout\" class=\"nav-link js-scroll-trigger\">Logout</a></li>";
        } else {
           /* echo "<li class=\"nav-item\"><a href=\"index.php?page=contact\" class=\"nav-link js-scroll-trigger\">Me contacter</a></li>";*/
            echo "<li class=\"nav-item\"><a href=\"index.php?page=login\" class=\"nav-link js-scroll-trigger\">Connexion</a></li>";
            if (isset($_POST['inscr'])) {
                $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
                $sql = "SELECT COUNT(*) FROM carnaxadmin WHERE MailAdmin='" . $mail . "'";
                if (idAdmin <= 1) {
                    echo "<li class=\"nav-item\"><a href=\"index.php?page=inscription\" class=\"nav-link js-scroll-trigger\">Inscription</a></li>";
                }
            }
        }
        ?>
    </div>
    <div class="clear"></div>

</header>
