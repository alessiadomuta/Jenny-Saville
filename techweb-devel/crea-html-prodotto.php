<?php

function creaHtmlProdotto(array $prodotti){
    $htmlprodotto = '<div id="primoContenuto" class="info">';
    if($prodotti == null){  
        $htmlprodotto .= "<p> Prodotto non disponibile. </p>";
    }
    else{
        $htmlprodotto .= '
            <h2 id="catgory" lang="en">'. $prodotti[0]['categoria'] .'</h2>
            <div id="pagina_prodotto" class="flex_row">
                <div class="flex_row">
                    <img id="shirt-preview" src="images/'.$prodotti[0]['immagine'].'.png" alt="'.$prodotti[0]['alt'].'" />
                </div>
                <div class="flex_column">
                    <dl class="flex_column no_gap">
                        <dt>Prezzo:</dt>
                        <dd><abbr title="euro">€</abbr>'.$prodotti[0]['prezzo'].'</dd>
                        <dt>Valutazione:</dt>
                        <dd>
                            <ol class="flex_row no_gap">';
                                for($i=0; $i<$prodotti[0]['stelle']; $i++){
                                    $htmlprodotto .= '<li>&#9733;</li>';
                                }
                                for($i=0; $i<5-$prodotti[0]['stelle']; $i++){
                                    $htmlprodotto .= '<li>&#9734;</li>';
                                }
                        $htmlprodotto .= '</ol>
                        </dd>
                        <dt>Modelli:</dt>
                        <dd>
                            <form action="#" class="flex_column" method="post" id="validatedForm_carrello">
                                <div class="flex_row">';
                                $i = 0;
                                foreach($prodotti as $prodotto){
                                    if($i == 0){
                                        $htmlprodotto .= '<label class="seleziona_modello" for="'.$prodotto['immagine'].'">
                                            <input type="radio" id="'.$prodotto['immagine'].'" name="immagine" value="'.$prodotto['immagine'].'" checked>
                                            <img src="images/'.$prodotto['immagine'].'.png" alt="'.$prodotto['alt'].'" onclick="changeMainImage(\'images/'.$prodotto['immagine'].'.png\')"/>
                                        '.$prodotto['nome'].'</label>';
                                    }
                                    else{
                                        $htmlprodotto .= '<label class="seleziona_modello" for="'.$prodotto['immagine'].'">
                                        <input type="radio" id="'.$prodotto['immagine'].'" name="immagine" value="'.$prodotto['immagine'].'">
                                        <img src="images/'.$prodotto['immagine'].'.png" alt="'.$prodotto['alt'].'" onclick="changeMainImage(\'images/'.$prodotto['immagine'].'.png\')"/>
                                        '.$prodotto['nome'].'</label>';
                                    }
                                    $i++;
                                }
                                $htmlprodotto .= '</div>';


                            if($prodotti[0]['taglia']!='U'){
                                $htmlprodotto .= '
                                <div class="flex_row">
                                    <label for="size">Taglia:</label>
                                    <select id="size" class="select-size" name="size">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>';
                            }


                            $htmlprodotto .= ' <input type="submit" class="infoButton" value="Aggiungi al carrello" name="submit-addtocart"/>
                            </form>
                        </dd>
                        <dt>Informazioni sul prodotto:</dt>
                        <dd>
                            <dl id="info_prodotto" class="flex_column no_gap">'.$prodotti[0]['informazioni'].'
                            </dl>
                        </dd>
                    </dl>
                </div>
            </div>';
    }
    $htmlprodotto .= '</div>';
    return $htmlprodotto;
}
?>