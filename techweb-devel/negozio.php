<?php

require_once "connessione.php"; 

$paginaHTML = file_get_contents("negozio.html");

use DB\DBAccess;

$connessione = new DBAccess();

$listaProdotti = "";
$prodotti = "";

$connessione = new DBAccess();
if($connessione->connOk()){

    $prodotti = $connessione->getListFromTable("prodotto WHERE categoria = 'basic'");
    $connessione->closeDBConnection();

    if($prodotti != null){   

        $listaProdotti .= '<ul class="negozio flex_row flex_wrap">';
        foreach($prodotti as $prodotto){
            
            $listaProdotti .= '<li class="flex_column no_gap">'
            .'<img src="images/'.$prodotto['immagine'].'.png" alt="'.$prodotto['alt'].'" />'
            .'<p>' .$prodotto['nome'] . '</p>'
            .'<p>'.$prodotto['prezzo'].'<abbr title="euro">€</abbr></p>'
            .'<a href="prodotto.php?categoria='.$prodotto['nome'].'" class="infoButton"> Personalizza </a>'
            .'</li>';
        }
        $listaProdotti .= '</ul>';
    }
    else{
        $listaProdotti = "<p> Nessun prodotto presente. </p>";
    }
}
else{
    $listaProdotti = "<p>I sistemi sono momentaneamente fuori servizio, ci scusiamo per il disagio.</p>";
}

echo str_replace("<listaprodotti/>", $listaProdotti, $paginaHTML);

?>