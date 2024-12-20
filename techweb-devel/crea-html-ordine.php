<?php
function creaHtmlOrdine(array $prodotti, array $user){
    
    $html = '<div id="primoContenuto" class="flex_column">
    <h2>Riepilogo ordine</h2>
    <div class="info">
        <h3>Riepilogo articoli</h3>
        <ol class="ordini_effettuati">
            <li>Immagine</li>
            <li>Articolo</li>
            <li>Quantità</li>
            <li>Taglia</li>
            <li>Totale</li>
            <li class="informazioni_prodotto"><abbr title="Informazioni">Info</abbr></li>
        </ol>
        <ul class="flex_column">';
        $prezzoTotale = 0;
        foreach($prodotti as $prodotto){
            $prezzo = (int)$prodotto['quantita']*(int)$prodotto['prezzo'];
            $prezzoTotale = $prezzoTotale + $prezzo;
            $html .= '       
            <li>
                <ol>
                    <li class="flex_row"><img src="images/'.$prodotto['immagine'].'.png" alt="'.$prodotto['alt'].'"></li>
                    <li>'.$prodotto['categoria'].'</li>
                    <li>
                        <dl id="'.$prodotto['id_prodotto'].'" class="nascondi_ordine">
                            <dt>Quantità:</dt>
                            <dd>'.$prodotto['quantita'].'</dd>
                            <dt>Taglia:</dt>
                            <dd>'.$prodotto['taglia'].'</dd>
                            <dt>Totale:</dt>
                            <dd>'.$prezzo.'<abbr title="euro">€</abbr></dd>
                        </dl>
                    </li>
                    <li>
                        <button type="button" onclick="toggleInfoAcquisto('.$prodotto['id_prodotto'].')" title="Mostra o nascondi le informazioni dell\'acquisto">Ulteriori&nbsp;informazioni</button>
                    </li>
                </ol>
            </li>';   
        }
    $totaleSpedizione = $prezzoTotale+5;
    $html .= '</ul>
    <a href="carrello.php" class="infoButton">Modifica articoli</a>
    </div>

    <div class="info">
    <messaggi/>
    <form action="esito_acquisto.html" method="post" id="validatedForm_profilo" class="flex_column modifica_dati" onsubmit="submitAcquisto(event)">

        <fieldset class="form_indirizzo">
            <legend>Indirizzo</legend>
            <div class="flex_column no_gap">
                <label for="provincia">Provincia</label>
                <input type="text" id="provincia" name="provincia" value="'.$user['provincia'].'" onblur="validateProvincia()"/>
                <span class="error none" id="errore_provincia">Nome provincia non valido</span>
            </div>
            <div class="flex_column no_gap">
                <label for="citta">Città</label>
                <input type="text" id="citta" name="citta" value="'.$user['citta'].'" onblur="validateCitta()"/>
                <span class="error none" id="errore_citta">Nome città non valido</span>
            </div>
            <div class="flex_column no_gap">
                <label for="cap">CAP</label>
                <input type="text" id="cap" name="cap" value="'.$user['CAP'].'" onblur="validateCAP()"/>
                <span class="error none" id="errore_cap">CAP deve essere composto da 5 numeri</span>
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
                <span class="error none" id="errore_titolare_carta">Titolare della carta non valido</span>
            </div>
            <div class="flex_column no_gap">
                <label for="numero_carta">Numero&nbsp;della&nbsp;carta</label>
                <input type="text" id="numero_carta" name="numero_carta" value="'.$user['numCarta'].'" onblur="validateNumCarta()"/>
                <span class="error none" id="errore_numero_carta">Numero della carta non valido</span>
            </div>
            <div class="flex_row">
                <fieldset>
                    <legend>Data&nbsp;di&nbsp;scadenza</legend>
                    <div class="flex_row">
                        <div class="flex_row">
                            <label for="mese">Mese</label>
                            <select id="mese" name="mese">';
                            for($i = 1; $i <= $user['meseScadenza']; $i++){
                                if($i < 10)
                                    $html .= '<option value="0'.(string)$i.'">0'.(string)$i.'</option>';
                                else
                                    $html .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                            }
                            $html .= '<option value="'.$user['meseScadenza'].'" selected = "selected">'.$user['meseScadenza'].'</option>';
                            for($i = (int)$user['meseScadenza'] +1; $i <= 12; $i++){
                                if($i < 10)
                                    $html .= '<option value="0'.(string)$i.'">0'.(string)$i.'</option>';
                                else
                                    $html .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                            }
                            $html .= '
                            </select>
                        </div>
                        <div class="flex_row">
                            <label for="anno">Anno</label>
                            <select id="anno" name="anno">';
                            for($i = 2023; $i <= $user['annoScadenza']; $i++){
                                $html .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                            }
                            $html .= '<option value="'.$user['annoScadenza'].'" selected = "selected">'.$user['annoScadenza'].'</option>';
                            for($i = (int)$user['annoScadenza'] +1; $i <= 2033; $i++){
                                $html .= '<option value="'.(string)$i.'">'.(string)$i.'</option>';
                            }
                        $html .= '
                            </select>
                        </div>
                    </div>
                </fieldset>
                <div class="flex_column no_gap">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" value="'.$user['cvv'].'" onblur="validateCvv()"/>
                    <span class="error none" id="errore_cvv">Cvv non valido</span>
                </div>
            </div>
        </fieldset>
        <h4>Totale ordine</h4>
        <dl id="totale_acquisto" class="flex_column no_gap">
            <dt>Totale articoli:</dt><dd>'.$prezzoTotale.'<abbr title="euro">€</abbr></dd>
            <dt>Spese di spedizione:</dt><dd>5<abbr title="euro">€</abbr></dd>
            <dt>Totale:</dt><dd>'.$totaleSpedizione.'<abbr title="euro">€</abbr></dd>
        </dl>
        <span class="error none" id="errore_submit">Alcuni dati non sono corretti</span>
        <input type="submit" class="infoButton" value="Conferma acquisto" name="submit"/>
    </form>
    </div>


</div>';
    return $html;
}
?>