<?php
function creaOrdiniConclusi(array $ordini){
$listaOrdini = '<h3>I miei ordini</h3>';
        $pre = "-1";
        foreach($ordini as $ordine){
            if($pre != $ordine['id_ordine']){
                if($pre != "-1") $listaOrdini .= '</ul>';
                $listaOrdini .= '<div class="numero_ordine flex_row flex_wrap">
                    <p>Ordine: '.$ordine['id_ordine'].'</p>
                    <p>Data: '.$ordine['data'].'</p>
                </div>
                <ol class="ordini_effettuati">
                    <li>Immagine</li>
                    <li>Articolo</li>
                    <li>Quantità</li>
                    <li>Taglia</li>
                    <li>Prezzo</li>
                    <li class="informazioni_prodotto"><abbr title="Informazioni">Info</abbr></li>
                </ol>
                <ul class="flex_column">';
                $pre = $ordine['id_ordine'];
            }
            $listaOrdini .= '<li>
            <ol>
                <li class="flex_row"><img src="images/'.$ordine['immagine'].'.png" alt="'.$ordine['alt'].'"></li>
                <li>'.$ordine['categoria'].'</li>
                <li>
                    <dl id="'.$ordine['id_ordine'].$ordine['id_prodotto'].'" class="nascondi_ordine">
                        <dt>Quantità:</dt>
                        <dd>'.$ordine['quantita'].'</dd>
                        <dt>Taglia:</dt>
                        <dd>'.$ordine['taglia'].'</dd>
                        <dt>Prezzo:</dt>
                        <dd>'.$ordine['prezzo']*$ordine['quantita'].'<abbr title="euro">€</abbr></dd>
                    </dl>
                </li>
                <li>
                    <button type="button" onclick="toggleInfoAcquisto('.$ordine['id_ordine'].$ordine['id_prodotto'].')" title="Mostra o nascondi le informazioni di acquisto">Ulteriori&nbsp;informazioni</button>
                </li>
            </ol>
            </li>';
        }
    $listaOrdini .= '</ul>';
    return $listaOrdini;
}

?>
