<?php
function creaHtmlProfilo($user, $errors){
    if($errors) $errors = "<div class = \"error\"><ul class=\"flex_column no_gap\">" . $errors . "</ul> </div>";
    $htmlprofilo = '<div id="primoContenuto" class="info info_piccolo">
            <h2>Modifica dei dati</h2>';
            if($errors) $htmlprofilo .= $errors;
            $htmlprofilo .='
                <form action="#" enctype="multipart/form-data" method="post" id="validatedForm_profilo" class="flex_column modifica_dati" onsubmit="submitModifica(event)">
                    <fieldset class="flex_column dati_personali">
                        <legend>Dati personali</legend>
                        <div id="cambio_immagine_profilo" class="flex_column">
                            <img src="profilo/'.$user['fotoProfilo'].'" id="immagine_profilo_nuova" alt="foto profilo"/>
                            <label for="user_img" id="immagine_profilo_label" class="infoButton">Modifica foto profilo</label>
                            <input type="file" id="user_img" class="none" name="userimage" accept="image/png, image/jpeg"/>
                            <span class="error none" id="errore_user_img"></span>
                        </div>
                        <div class="flex_row">
                            <label for="user_name">Nuovo&nbsp;<span lang="en">username</span></label>
                            <input type="text" id="user_name" name="username" value="'.$user['username'].'" onblur="validateUsername()"/>
                            <span class="error none" id="errore_user_name">Lo username può contenere solo lettere e numeri</span>
                        </div>
                        <div class="flex_row">
                            <label for="pass_old">Nuova&nbsp;<span lang="en">password</span> </label>
                            <input type="password" id="pass_old" name="password" value="'.$user['password'].'" onblur="validatePassword()"/>
                            <span class="error none" id="errore_pass_old">La <span lang=\'en\'>password</span> deve contenere più di 8 caretteri tra questi deve esserci ameno una una lettera maiuscola, una lettera minuscola e un numero.</span>
                        </div>
                        <div class="flex_row">
                            <label for="pass_rep">Ripeti&nbsp;<span lang="en">password</span></label>
                            <input type="password" id="pass_rep" name="password_rep" value="'.$user['password'].'" onblur="validatePswConfirm()"/>
                            <span class="error none" id="errore_pass_rep">Le due password non corrispondono</span>
                        </div>
                    </fieldset>

                    <fieldset class="form_indirizzo">
                        <legend>Indirizzo</legend>
                        <div class="flex_column no_gap">
                            <label for="provincia">Provincia</label>
                            <input type="text" id="provincia" name="provincia" value="'.$user['provincia'].'" onblur="validateProvincia()"/>
                            <span class="error none" id="errore_provincia">Nome della provincia non valido</span>
                        </div>
                        <div class="flex_column no_gap">
                            <label for="citta">Città</label>
                            <input type="text" id="citta" name="citta" value="'.$user['citta'].'" onblur="validateCitta()"/>
                            <span class="error none" id="errore_citta">Nome della città non valido</span>
                        </div>
                        <div class="flex_column no_gap">
                            <label for="cap">CAP</label>
                            <input type="text" id="cap" name="cap" value="'.$user['CAP'].'" onblur="validateCAP()"/>
                            <span class="error none" id="errore_cap">Il CAP deve essere composto da 5 numeri</span>
                        </div>
                        <div class="flex_column no_gap">
                            <label for="indirizzo">Indirizzo</label>
                            <input type="text" id="indirizzo" name="indirizzo" value="'.$user['indirizzo'].'" onblur="validateIndirizzo()"/>
                            <span class="error none" id="errore_indirizzo">Indirizzo non valido</span>
                        </div>
                        <div class="flex_column no_gap">
                            <label for="civico">Numero&nbsp;civico</label>
                            <input type="text" id="civico" name="civico" value="'.$user['numCivico'].'" onblur="validateNumCivico()"/>
                            <span class="error none" id="errore_civico">Numero civico non valido</span>
                        </div>
                        <div class="flex_column no_gap">
                            <label for="interno">Interno</label>
                            <input type="text" id="interno" name="interno" value="'.$user['interno'].'" onblur="validateNomeCitofono()"/>
                            <span class="error none" id="errore_interno">Interno non valido</span>
                        </div>
                    </fieldset>

                    <fieldset class="form_pagamento flex_column">
                        <legend>Metodo di pagamento</legend>
                        <div class="flex_column no_gap">
                            <label for="titolare_carta">Titolare&nbsp;della&nbsp;carta</label>
                            <input type="text" id="titolare_carta" name="titolare_carta" value="'.$user['titolare'].'" onblur="validateTitolare()"/>
                            <span class="error none" id="errore_titolare_carta">Nome del titolare della carta non valido</span>
                        </div>
                        <div class="flex_column no_gap">
                            <label for="numero_carta">Numero&nbsp;della&nbsp;carta</label>
                            <input type="text" id="numero_carta" name="numero_carta" value="'.$user['numCarta'].'" onblur="validateNumCarta()"/>
                            <span class="error none" id="errore_numero_carta">Il numero della carta deve essere nel formato corretto</span>
                        </div>
                        <div class="flex_row">
                            <fieldset>
                                <legend>Data&nbsp;di&nbsp;scadenza</legend>
                                <div class="flex_row">
                                    <div class="flex_row">
                                        <label for="mese">Mese</label>
                                        <select id="mese" name="mese">';
                                        $anno = $user['annoScadenza'];
                                        $mese = $user['meseScadenza'];
                                        if(!$mese) $mese = "01";
                                        for($i = 1; $i < (int)$mese; $i++){
                                            if($i < 10)
                                                $htmlprofilo .= '<option value="0'.(string)$i.'">0'.(string)$i.'</option>';
                                            else
                                                $htmlprofilo .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                                        }
                                        $htmlprofilo .= '<option value="'.$mese.'" selected = "selected">'.$mese.'</option>';
                                        for($i = (int)$mese +1; $i <= 12; $i++){
                                            if($i < 10)
                                                $htmlprofilo .= '<option value="0'.(string)$i.'">0'.(string)$i.'</option>';
                                            else
                                                $htmlprofilo .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                                        }
                                        $htmlprofilo .= '
                                        </select>
                                    </div>
                                    <div class="flex_row">
                                        <label for="anno">Anno</label>
                                        <select id="anno" name="anno">';
                                        if(!$anno) $anno = 2023;
                                        for($i = 2023; $i <= $anno; $i++){
                                            $htmlprofilo .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                                        }
                                        $htmlprofilo .= '<option value="'.$anno.'" selected = "selected">'.$anno.'</option>';
                                        for($i = (int)$anno +1; $i <= 2033; $i++){
                                            $htmlprofilo .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                                        }
                                    $htmlprofilo .= '
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="flex_column no_gap">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" value="'.$user['cvv'].'" onblur="validateCvv()"/>
                                <span class="error none" id="errore_cvv">Il cvv deve essere composto da 3 numeri</span>
                            </div>
                        </div>
                    </fieldset>
                    <span class="error none" id="errore_submit">Alcuni campi dati sono errati</span>
                    <input type="submit" class="infoButton" value="Conferma modifiche" name="submit"/>
            </form>



            </div>';
    return $htmlprofilo;
}
?>