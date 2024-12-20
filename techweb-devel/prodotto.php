<?php
session_start();

require_once "connessione.php";
require_once "crea-html-prodotto.php";
require_once "crea-html-recensioni.php";
require_once "clear-input.php";
 
$categoria = $_GET['categoria'];
$prodotto = "";
$username = "";
$html = "";
$esitoAggiunta = "";
$logged = false;
$paginaHTML = file_get_contents("prodotto.html");

if(isset($_SESSION['utente'])){
    $username = $_SESSION['utente'];
    $logged = true;
}

use DB\DBAccess;


$connessione = new DBAccess();
if($connessione->connOk()){
    $user = $connessione->getRowTable("utente WHERE username = \"$username\"");
    $prodotto = $connessione->getListFromTable("prodotto WHERE categoria ='".$categoria."' GROUP BY immagine");
    $recensioni = $connessione->getListFromTable("recensione JOIN utente ON recensione.username = utente.username WHERE recensione.prodotto=\"$categoria\" ORDER BY id_recensione DESC");
    if(isset($_POST['submit-review'])){
        if ($logged) {
            $esitoAggiunta = "";
            $rev=clearInput($_POST['recensione']);
            $connessione->addReview($categoria, $username, $rev, $_POST['stelle']);
            $html .= $esitoAggiunta . $html;
            header("Refresh:0");
        }
        else{
            header('Location: login.php');
            exit;
        }
        
    }

    if (isset($_POST['submit-addtocart'])){
        if ($logged) {
            $esitoAggiunta =  "";
            $size = $_POST['size'];
            $immagine = $_POST['immagine'];
            if($size == null){
                $size = 'U';
            }
            $prodottoSelezionato = $connessione->getRowTable("prodotto WHERE categoria=\"$categoria\" AND taglia=\"$size\" AND immagine=\"$immagine\"");
            $connessione->addToBasket($username, $prodottoSelezionato['id_prodotto']);
            $esitoAggiunta = "<div class=\"info positivo\"><p>Prodotto aggiunto correttamente al carrello!</p></div>";
        }else{
            header('Location: login.php');
            exit;
        }
    }
    $html .= $esitoAggiunta . $html;
    $connessione->closeDBConnection();
    $html .= creaHtmlProdotto($prodotto);
    $html .= creaHtmlRecensioni($recensioni, $user);

    if(!$logged){
        $html = '<div class="info"><p>Per aggiungere prodotti al carrello o lasciare rencensioni devi aver effettuato il login<p> <a class="infoButton formAltraOpzione" href="login.php">ACCEDI</a></div>' . $html;
    }

    $paginaHTML = str_replace("<kwProdotto/>", $prodotto[0]['keywords'] , $paginaHTML);
}else{
    $html = "<p>I sistemi sono momentaneamente fuori servizio, ci scusiamo per il disagio.</p>";
}

$paginaHTML = str_replace("<bcProdotto/>", $categoria , $paginaHTML);

echo str_replace("<htmlprodotto/>", $html, $paginaHTML);
?>