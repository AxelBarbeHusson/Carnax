<?php
$USER = isset( $_GET['nom'.'prenom'])? $_GET['USER'] : "";
$mdp = isset($_GET['mdp']) ? $_GET['mdp'] : "";
$mail =isset($_GET['mail']) ? $_GET['mail'] : "";
$objet =isset($_GET['objet']) ? $_GET['objet'] : "";
$txt =isset($_GET['txt']) ? $_GET['txt'] : "";
define('USER');
define('mdp');
define('mail');
define('objet');
define('txt');
define('SERVER',"localhost");
define('BASE');
