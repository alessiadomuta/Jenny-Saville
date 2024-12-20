<?php
session_start();
require_once "connessione.php";
require_once "crea-html-carrello.php";

$username = "";
$erroreLogin ="";
if (isset($_SESSION['utente'])) { 
    $username = $_SESSION['utente'];
    $erroreLogin = 'Nessun prodotto nel carrello';     
}
else{
    $erroreLogin = 'Per aggiungere prodotti al carrello devi aver effettuato il login <a class="infoButton formAltraOpzione" href="login.php">ACCEDI</a>';
}

$paginaHTML = file_get_contents("carrello.html");

use DB\DBAccess;

$connessione = new DBAccess();

$htmlcarrello = "";
$carrello = "";

$connessione = new DBAccess();
if($connessione->connOk()){

    if (isset($_GET['action'])){

        switch ($_GET['action']){
        case 'remove':
            $esitoRimozione = "";
            $connessione->removeFromCart($username, $_GET['item']);
            $esitoRimozione = "<div class=\"info positivo\">Prodotto rimosso dal carrello<p></div>";
            $htmlcarrello = $esitoRimozione;
            break;
        case 'update':
            if (isset($_POST['quantita'])) {
                $esitoUpdate = "";
                $connessione->changeProductQuantity($username, $_GET['item'], $_POST['quantita']);
                $esitoRimozione = "<div class=\"info positivo\">Quantità cambiata con successo<p></div>";
                $htmlcarrello = $esitoUpdate;
            }
            break;
        }
    }

    $carrello = $connessione->getListFromTable("carrello JOIN prodotto ON carrello.id_prodotto = prodotto.id_prodotto
    WHERE username = \"$username\"");
    $connessione->closeDBConnection();

    $htmlcarrello = '<div id="primoContenuto" class="info">';
    if($carrello)
        $htmlcarrello .= creaHtmlCarrello($carrello);
    else
        $htmlcarrello .= "<p>".$erroreLogin."</p></div>";

}   
else{
    $htmlcarrello = "<p>I sistemi sono momentaneamente fuori servizio, ci scusiamo per il disagio.</p>";
}

echo str_replace("<htmlcarrello/>", $htmlcarrello, $paginaHTML);

?>