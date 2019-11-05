<?php
function displayTitle() : string
{
    $titre = "Carnex ";
    $page = isset($_GET['page']) ? $_GET['page'] : "accueil";
    $titre .= ucfirst($page);
    return $titre;
}