<?php
function creaHtmlCarrello(array $carrello){
    $htmlcarrello ='
        <h2>Carrello</h2>
        <ol id="intestazione_carrello">
            <li>Immagine</li>
            <li>Articolo</li>
            <li>Quantità</li>
            <li>Taglia</li>
            <li>Unità</li>
            <li>Totale</li>
            <li>Rimuovi</li>
            <li class="informazioni_prodotto"><abbr title="Informazioni">Info</abbr></li>
        </ol>
        <ul id="lista_carrello" class="flex_column">';

        $totaleArticolo = 0;
        $totale = 0;

        foreach ($carrello as $prodotto) {
            #calcolo totali
            $totaleArticolo = (int) $prodotto['prezzo'] * (int) $prodotto['quantita'];
            $totale = $totale + $totaleArticolo;

            $htmlcarrello .=
                '<li>
                    <ol>
                        <li class="flex_row"><img src="images/' . $prodotto['immagine'] . '.png" alt="'.$prodotto['alt'].'"></li>
                        <li>' . $prodotto['categoria'] . '</li>
                        <li class="flex_row no_gap">
                        <form id="item-form-'.$prodotto['id_carrello'].'" method="post" action="carrello.php?action=update&item='.$prodotto['id_carrello'].'">
                            <label for="quantita-'.$prodotto['immagine'].'">Quantità</label>
                            <input type="number" id="quantita-'.$prodotto['immagine'].'" name="quantita" value="'. $prodotto['quantita'] .'" min="1" onchange="changeQuantity(\''.$prodotto['id_carrello'].'\')">
                            <input type="submit" class="none" name="submit">
                        </form></li> 
                        <li>
                            <dl id="'.$prodotto['id_prodotto'].'" class="nascondi_ordine">
                                    <dt>Taglia:</dt>';
                                    if ($prodotto['taglia'] == 'U') {
                                        $htmlcarrello .= '<dd>Unica</dd>';
                                    } else {
                                        $htmlcarrello .= '<dd>'.$prodotto['taglia'].'</dd>';
                                    }
                                    $htmlcarrello .= '
                                    <dt>Unità:</dt>
                                    <dd>' . $prodotto['prezzo'] . '<abbr title="euro">€</abbr></dd>
                                    <dt>Totale:</dt>
                                    <dd>' . $totaleArticolo . '<abbr title="euro">€</abbr></dd>
                                    <dt>Rimuovi:</dt>
                                    <dd class="rimuoviArticolo"><a href="carrello.php?action=remove&item='.$prodotto['id_carrello'].'">Rimuovi articolo</a></dd>
                            </dl>
                        </li>
                        <li>
                            <button type="button" onclick="toggleInfoAcquisto('.$prodotto['id_prodotto'].')" title="Mostra o nascondi le informazioni dell\'acquisto">Ulteriori&nbsp;informazioni</button>
                        </li>
                    </ol>
                </li>';

        }

        $htmlcarrello .=
            '</ul>
            <div id="footer_carrello">
                <dl>
                    <dt>Totale&nbsp;ordine:</dt>
                    <dd>' . $totale . '<abbr title="euro">€</abbr></dd>
                </dl>
            </div>
            <a href="acquisto.php" class="infoButton">Acquista ora</a>';
        
    $htmlcarrello .= '</div>';
    return $htmlcarrello;
}
?>