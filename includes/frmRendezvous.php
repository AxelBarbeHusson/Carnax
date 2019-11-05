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
<form method="post" action="#">
    <div class="encadrement">
        <fieldset>

            <p class="champsObligatoires">* champs obligatoires </p>


            <div class="ligneForm">
                <label for="lastname">Nom *:</label>
                <div class="champForm">
                    <input class="box" type="text" size="70" name=""
                           value="<?$nom?>"/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="firstname">Prénom *:</label>
                <div class="champForm">
                    <input class="box" type="text" size="70" name=""
                           value="<?$prenom?>"/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="email">Adresse électronique *:</label>
                <div class="champForm">
                    <input class="box" type="text" size="20" name=""
                           value="<?$mail?>"/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="adresse">Adresse postale :</label>
                <div class="champForm">
                        <textarea class="box" name="ContentObjectAttribute_data_text_148091" cols="70"
                                  rows="3"></textarea><!--<input class="box" type="text" name="" >--></div>
            </div>
            <div class="separateur_2"></div>
            <div class="ligneForm">
                <label for="cp">Code postal :</label>
                <div class="champForm">
                    <input class="box" type="text" size="70" name=""
                           value="<?$postal?>"/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="city">Ville :</label>
                <div class="champForm">
                    <input class="box" type="text" size="70" name=""
                           value="<?$vpostal?>"/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="telephone">Téléphone :</label>
                <div class="champForm">
                    <input class="box" type="text" size="70" name="ContentObjectAttribute_ezstring_data_text_148094"
                           value="<?$phone?>"/></div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="date">Date *:</label>
                <div class="champForm">
                    <input class="box" type="date" size="20" name=""
                           value="<?$date?>"/></div>
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
                <div class="champForm">
                    <input class="box" type="text" size="70" name=""
                           value="<?$objet?>"/>
                </div>
            </div>

            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="message">Message *:</label>
                <div class="champForm">
                                        <textarea class="box" name="" cols="70"
                                                  rows="10" ></textarea>
                    <input class="box" type="text" size="70" name="" value="<?$msg?>"/>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm">
                <label for="captcha">Caractères de sécurité. *:</label>
                <div class="champForm captcha">
                    <div id="ide-captcha">
                        <span class="loading">Chargement en cours...</span>
                    </div>
                    <a href="#" id="ide-captcha-audio"
                       title="Cliquez sur ce lien pour obtenir les caractères de sécurité audio"></a>
                    <a href="#" id="ide-captcha-image"
                       title="Cliquez pour générer un nouveau code de sécurité"></a>
                    <div class="break"></div>
                    <div class="block_spam">
                        <img src="#"
                             alt="eZHumanCAPTCHACode"/>
                        <input id="ezcoa-569_captcha" class="box ezcc-feedback_form ezcca-feedback_form_captcha"
                               type="text" size="10" name="ContentObjectAttribute_data_text_148103" value=""/>
                    </div>
                </div>
            </div>
            <div class="separateur"></div>
            <div class="ligneForm nolabel">
                <input type="hidden" name="ContentNodeID" value="25257"/>
                <input type="hidden" name="ContentObjectID" value="25575"/>
                <input type="hidden" name="ViewMode" value="full"/>
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