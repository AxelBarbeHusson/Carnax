<?php
if (!isset($mail)) $mail = "";
if (!isset($nom)) $nom = "";
if (!isset($prenom)) $prenom = "";
if (!isset($sujet)) $sujet = "";
if (!isset($apostal)) $apostal = "";
if (!isset($cpostal)) $cpostal = "";
if (!isset($ville)) $ville = "";
if (!isset($phone)) $phone = "";
if (!isset($date)) $date = "";
if (!isset($msg)) $msg = "";
?>

<form method="post" action="index.php?page=test">
    <fieldset>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $nom ?>"/>
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>"/>
        </div>
        <div>
            <label for="mail">Adresse électronique :</label>
            <input type="email" id="mail" name="mail" value="<?= $mail ?>"/>
        </div>
        <div>
            <label for="apostal">Adresse postale :</label>
            <textarea id="apostal" name="apostal" value="<?= $apostal ?>">Votre adresse postal</textarea>
        </div>
        <div>
            <label for="cpostal">Code postal :</label>
            <input class="box" type="text" name="cpostal" id="cpostal" value="<?= $cpostal ?>"/>
        </div>
        <div>
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville" value="<?= $ville ?>"/>
        </div>
        <div>
            <label for="phone">Téléphone :</label>
            <input type="tel" name="phone" id="phone" value="<?= $phone ?>"/>
        </div>
    </fieldset>

    <fieldset>
        <div>
            <label for="sujet">Sujet :</label>
            <input type="text" id="sujet" name="sujet" value="<?= $sujet ?>"/>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" value="<?= $date ?>"/>
        </div>
        <div>
            <label for="msg">Message :</label>
            <textarea id="msg" name="msg" value="<?= $msg ?>">Votre message</textarea>

        </div>
        <div>
            <input class="blue_button" type="submit" value="Envoyer"/>
            <input class="blue_button" type="reset" value="Effacer"/>
        </div>
    </fieldset>
    <input type="hidden" name="test"/>
</form>
