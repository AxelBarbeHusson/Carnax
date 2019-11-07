<?php
if (!isset($nom)) $login = "";
if (!isset($mail)) $mail = "";
?>
<form method="post" action="index.php?page=inscription">
    <div>
        <label for="login">Login&nbsp;: </label>
        <input type="text" id="login" name="login" value="<?=$login?>" />
    </div>
    <div>
        <label for="mail">Mail&nbsp;: </label>
        <input type="text" id="mail" name="mail" value="<?=$mail?>" />
    </div>
    <div>
        <label for="mdp">Mot de passe&nbsp;: </label>
        <input type="password" id="mdp" name="mdp" />
    </div>
    <div>
        <input type="submit" value="Valider" />
    </div>
    <input type="hidden" name="inscr" />
</form>
