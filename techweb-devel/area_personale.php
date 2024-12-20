<?php
    session_start();

    if(!isset($_SESSION['utente'])) {
        header('Location: login.php');
        exit;
    }

    require_once "connessione.php";
    require_once "crea-html-profilo.php";
    require_once "crea-html-ordini-conclusi.php";

    $paginaHTML = file_get_contents("area_personale.html");
    $listaOrdini = "";

    use DB\DBAccess;

    $connessione = new DBAccess();
    if($connessione->connOk()){

        $username = $_SESSION['utente'];
        $user = $connessione->getRowTable("utente WHERE username = \"$username\" OR email = \"$username\"");
        
        $username = $user['username'];
        $ordini = $connessione->getListFromTable("ordine JOIN prodotto WHERE username = \"$username\"
        AND ordine.id_prodotto = prodotto.id_prodotto"); 
        $connessione->closeDBConnection();
        
        $htmlprofilo = creaHtmlProfilo($user);
        if($ordini != null){   
            $listaOrdini = creaOrdiniConclusi($ordini);
        }
        else{
            $listaOrdini = "<p> Nessun ordine presente. </p>";
        }
    }
    else
        $messaggi .= "<li>Connessione al database non riuscita</li>";
      
    $paginaHTML = str_replace('<Profilo/>', $htmlprofilo, $paginaHTML);    
    $paginaHTML = str_replace('<Ordini/>', $listaOrdini, $paginaHTML);    
    echo $paginaHTML; 

?>