<?php
function creaHtmlRecensioni($recensioni, $user){
    $htmlrecensioni = '<div class="info">';
    
    if($user){
        $htmlrecensioni .= '<h3>Inserisci una recensione</h3>
        <div id="inserimento_recensione" class="flex_column">
            <img src="profilo/'.$user['fotoProfilo'].'" alt="foto profilo"/>
            <p>'.$user['username'].'</p>
            <form action="#" class="flex_column" method="post" id="validatedForm_recensione">
                <div id="stelle_recensione" class="flex_row no_gap">
                    <input type="radio" id="stella_5" name="stelle" value="5" checked>
                    <label class="voto_prodotto" id="stella_5_label" for="stella_5">5</label>
                    <input type="radio" id="stella_4" name="stelle" value="4">
                    <label class="voto_prodotto" id="stella_4_label" for="stella_4">4</label>
                    <input type="radio" id="stella_3" name="stelle" value="3">
                    <label class="voto_prodotto" id="stella_3_label" for="stella_3">3</label>
                    <input type="radio" id="stella_2" name="stelle" value="2">
                    <label class="voto_prodotto" id="stella_2_label" for="stella_2">2</label>
                    <input type="radio" id="stella_1" name="stelle" value="1">
                    <label class="voto_prodotto" id="stella_1_label" for="stella_1">1</label>
                </div>
                <label for="recensione">Recensione: </label>
                <textarea id="recensione" name="recensione"></textarea>
                <input type="submit" class="infoButton" value="Inserisci recensione" name="submit-review"/>
            </form>
        </div>';
    }
    else
    
    $htmlrecensioni .= '<h3>Tutte le recensioni</h3>';
    
    if($recensioni == null){
        $htmlrecensioni .= "<p> Ancora non ci sono recensioni. </p>";
    }
    else{
        $htmlrecensioni .= '<div id="recensioni" class="flex_column">';
        foreach($recensioni as $recensione){
            $htmlrecensioni .= '
            <div class="flex_row">
                    <img src="profilo/'.$recensione['fotoProfilo'].'" alt="foto profilo"/>
                    <dl class="flex_column no_gap">
                        <dt class="none">Utente:</dt>
                        <dd>'.$recensione['username'].'</dd>
                        <dt class="none">Voto:</dt>
                        <dd>
                            <ol class="flex_row no_gap">';
                            for($i=0; $i<$recensione['stelle']; $i++){
                                $htmlrecensioni .= '<li>&#9733;</li>';
                            }
                            for($i=0; $i<5-$recensione['stelle']; $i++){
                                $htmlrecensioni .= '<li>&#9734;</li>';
                            }
                            $htmlrecensioni .= '</ol>
                        </dd>
                        <dt class="none">Commento:</dt>
                        <dd>'.$recensione['testo'].'</dd>
                    </dl>
                </div>';
        }
    }
    
    $htmlrecensioni .= '</div></div>';
    return $htmlrecensioni;
}
?>