<?php
if (!isset($mail)) $mail = "";
if (!isset($mdp)) $mdp = "";
?>

    <form method="post" action="index.php?page=login" class="form-wrap">
        <h1>Login</h1>
        <label for="mail"><b>Email :</b></label>
        <input type="text" placeholder="Entrez votre Email" id="mail" name="mail" required value="<?= $mail ?>">
        <label for="mdp"><b>Mot de passe :</b></label>
        <input type="password" placeholder="Saisir le mot de passe" id="mdp" value="<?= $mdp ?>" name="mdp"
               required>
        <div>
            <input type="submit" value="Envoyer">
            <input type="reset" value="Reset">
        </div>

        <input type="hidden" name="barnabe"/>
    </form>



