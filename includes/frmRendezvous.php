<?php
if (!isset($mail)) $mail = "";
if (!isset($nom)) $nom = "";
if (!isset($prenom)) $prenom = "";
if (!isset($objet)) $objet = "";
if (!isset($msg)) $msg = "";
if (!isset($date)) $date = "";
if (!isset($postal)) $postal = "";
if (!isset($vpostal)) $vpostal = "";
if (!isset($phone)) $phone = "";
?>
<form method="post" action="index.php?page=rendezVous">
    <div class="encadrement">
        <fieldset>

            <p class="champsObligatoires">* champs obligatoires </p>


            <div class="ligneForm">
                <label for="lastname">Nom *:</label>
                <div class="champForm" value="<?$nom?>">
                    <input class="box" type="text" size="70" name=""
                           /></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="firstname">Prénom *:</label>
                <div class="champForm" value="<?$prenom?>">
                    <input class="box" type="text" size="70" name=""
                           /></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="email">Adresse électronique *:</label>
                <div class="champForm" value="<?$mail?>>
                    <input class="box" type="text" size="20" name=""
                           "/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="adresse" >Adresse postale :</label>
                <div class="champForm" >
                        <textarea class="box" name="ContentObjectAttribute_data_text_148091" cols="70"
                                  rows="3"></textarea><!--<input class="box" type="text" name="" >--></div>
            </div>
            <div class="separateur_2"></div>
            <div class="ligneForm">
                <label for="cp">Code postal :</label>
                <div class="champForm" value="<?$postal?>">
                    <input class="box" type="text" size="70" name=""
                           /></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="city">Ville :</label>
                <div class="champForm"  value="<?$vpostal?>">
                    <input class="box" type="text" size="70" name=""
                          /></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="telephone">Téléphone :</label>
                <div class="champForm" value="<?$phone?>">
                    <input class="box" type="text" size="70" name="ContentObjectAttribute_ezstring_data_text_148094"
                           /></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="date">Date *:</label>
                <div class="champForm" value="<?$date?>">
                    <input class="box" type="date" size="20" name=""
                           /></div>
            </div>

        </fieldset>
    </div>
    <div class="encadrement">
        <fieldset>
            <legend>Votre message</legend>
            <p class="champsObligatoires"> * champs obligatoires </p>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="sujet">Sujet *:</label>
                <div class="champForm" value="<?$objet?>">
                    <input class="box" type="text" size="70" name=""
                           />
                </div>
            </div>

            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="message">Message *:</label>
                <div class="champForm"value="<?$msg?>">
                                        <textarea class="box" name="" cols="70"
                                                  rows="10" ></textarea>

            </div>
            <div class="separateur"></div>
              <input class="blue_button" type="submit" value="Envoyer" name=""/>
            </div>
        </fieldset>
    </div>
</form>
<!---->
</div>
<!--/col1-->
<div id="col2">
</div>
<!--/col2-->
</div>
<div class="cleaner">&nbsp;</div>
<!--/block_content-->
</div>