<?php
if (!isset($nom)) $nom = "";
if (!isset($prenom)) $prenom = "";
if (!isset($mail)) $mail = "";
?>
<form method="post" action="index.php?page=inscriptions">
    <div>
        <label for="nom">Nom&nbsp;: </label>
        <input type="text" id="nom" name="nom" value="<?= $nom ?>"/>
    </div>
    <div>
        <label for="prenom">Prénom&nbsp;: </label>
        <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>"/>
    </div>
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
    <input type="hidden" name="maurice"/>
</form>