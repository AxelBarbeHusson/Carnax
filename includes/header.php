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
        echo "<li><a href=\"index.php?page=logout\">Logout</a></li>";
        } else {
        echo "<li><a href=\"index.php?page=login\">Login</a></li>";
        }
        ?>
    </div>
    <div class="clear"></div>

</header>
