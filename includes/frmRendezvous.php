<?php
if (!isset($mail)) $mail = "";
if (!isset($name)) $name = "";
if (!isset($prenom)) $prenom = "";
if (!isset($objet)) $objet = "";
if (!isset($msg)) $msg = "";
if (!isset($date)) $date = "";
?>
<form method="post" action="index.php?page=rendezVous">
    <div>
        <label for="nom">Nom&nbsp;: </label>
        <input type="text" id="nom" name="nom" value="<?= $name ?>"/>
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
        <label for="objet">Objet&nbsp;: </label>
        <input type="text" id="objet" name="objet" value="<?= $objet ?>"/>
    </div>
    <div>
        <label for="msg">Votre message&nbsp;: </label>
        <?php
        $clean = trim($msg, "\x00..\x1F");
        ?>
        <input type="text" id="msg" name="msg" value="<?= $msg ?>"/>
    </div>
    <div>
        <input type="hidden" id="datetime" name="date" value="<?= $date ?>"/>
    </div>
        <div>
        <input type="reset" value="Effacer"/>
        <input type="submit" value="Envoyer"/>
    </div>
    <input type="hidden" name="Kontact"/>
</form>