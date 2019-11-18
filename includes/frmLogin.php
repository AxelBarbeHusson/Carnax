<?php
if (!isset($pseudo)){
    $pseudo ="";
}
?>

<form method="post" action="index.php?page=login">
    <div>
        <label for="pseudo">login: </label>
        <input type="text" id="pseudo" name="pseudo" value="<?=$pseudo?>" />
    </div>
    <div>
        <label for="mdp">Mot de passe: </label>
        <input type="password" id="mdp" name="mdp" />
    </div>
    <div>
        <input type="submit" value="Valider" />
    </div>
    <input type="hidden" name="log" />

</form>
