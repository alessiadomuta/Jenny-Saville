<?php
    session_start();

    if(!isset($_SESSION['utente'])) {
        header('Location: login.php');
        exit;
    }

    require_once "connessione.php";
    require_once "crea-html-ordine.php";
    require_once "clear-input.php";

    $paginaHTML = file_get_contents("acquisto.html");
    $messaggi = "";
    $email = "";
    $provincia = "";
    $citta = "";
    $CAP = "";
    $indirizzo = "";
    $numCivico = "";
    $interno = "";
    $numCarta = "";
    $titolare = "";
    $annoScadenza = "";
    $meseScadenza = "";
    $cvv = "";

    use DB\DBAccess;

    $connessione = new DBAccess();
    
    if($connessione->connOk()){
        $username = $_SESSION['utente'];
        $riga = $connessione->getRowTable("utente WHERE username = \"$username\" OR email = \"$username\"");
    
        $username = $riga['username'];

        $prodotti = $connessione->getListFromTable("carrello JOIN prodotto ON carrello.id_prodotto = prodotto.id_prodotto
        WHERE username = \"$username\"");

        if(isset($_POST['submit'])){
            $provincia = clearInput($_POST['provincia']);
            $citta = clearInput($_POST['citta']);
            $CAP = clearInput($_POST['cap']);
            $indirizzo = clearInput($_POST['indirizzo']);
            $numCivico = clearInput($_POST['civico']);
            $interno = clearInput($_POST['interno']);
            $numCarta = clearInput(preg_replace('/(\s|-)/', '', $_POST['numero_carta']));
            $titolare = clearInput($_POST['titolare_carta']);
            $annoScadenza = clearInput($_POST['anno']);
            $meseScadenza = clearInput($_POST['mese']);
            $cvv = clearInput($_POST['cvv']);

            if (!preg_match('/^[A-zÀ-ú\s\']+$/', $provincia)) {
                $messaggi .= "<li>Provincia non valida</li>";
            }

            if (!preg_match('/^[A-zÀ-ú\s\']+$/', $citta)) {
                $messaggi .= "<li>Città non valida</li>";
            }

            if (!preg_match('/^[0-9]{5}$/', $CAP)) {
                $messaggi .= "<li>CAP non valido</li>";
            }

            if (!preg_match('/^[A-zÀ-ú\s\']+$/', $indirizzo)) {
                $messaggi .= "<li>Indirizzo non valido</li>";
            }

            if (!preg_match('/^[0-9]+$/', $numCivico)) {
                $messaggi .= "<li>Numero civico non valido</li>";
            }

            if (!preg_match('/^[A-zÀ-ú\s\']+$/', $interno)) {
                $messaggi .= "<li>Nome citofono non valido</li>";
            }

            if (!preg_match('/^[A-zÀ-ú\s\']+$/', $titolare)) {
                $messaggi .= "<li>Titolare non valido</li>";
            }

            if (!preg_match('/^[0-9]{16}/', $numCarta)) {
                $messaggi .= "<li>Numero carta non valido</li>";
            }

            if (!preg_match('/^[0-9]{3}$/', $cvv)) {
                $messaggi .= "<li>Cvv non valido</li>";
            }
            
            if($messaggi==""){
                if(!empty($provincia) && !empty($citta) && !empty($CAP) &&!empty($indirizzo) && !empty($numCivico) && !empty($interno) && !empty($titolare) && !empty($annoScadenza) && !empty($meseScadenza) && !empty($cvv) ){

                    $connessione->insertNewOrder($username, $provincia, $citta, $CAP, 
                    $indirizzo, $numCivico, $interno, $titolare, $annoScadenza, $meseScadenza, $cvv);

                    $connessione->emptyCart($username);
                    $connessione->closeDBConnection();
                    header("Location: area_personale.php");
                    exit;
                }
                else
                    $messaggi .= "<li>Compilare tutti i campi richiesti</li>";
            }
        }

        $html = creaHtmlOrdine($prodotti, $riga);
    }
    else
        $messaggi .= "<li>Connessione al database non riuscita</li>";

    if($messaggi!="")
            $messaggi = "<div class = \"error\"><ul>" . $messaggi . "</ul> </div>";

    $html = str_replace('<messaggi/>', $messaggi, $html);
    $paginaHTML = str_replace('<htmlordine/>', $html, $paginaHTML);
    echo $paginaHTML;

?>