<?php
    session_start();

    if(!isset($_SESSION['utente'])) {
        header('Location: login.php');
        exit;
    }

    require_once "connessione.php";
    require_once "crea-html-modifica-profilo.php";
    require_once "clear-input.php";

    $paginaHTML = file_get_contents("modifica_profilo.html");
    $messaggi = "";
    $riga = "";

    use DB\DBAccess;

    $connessione = new DBAccess();
    if($connessione->connOk()){
        $username = $_SESSION['utente'];
        $riga = $connessione->getRowTable("utente WHERE username = \"$username\" OR email = \"$username\"");
    }
    else
        $messaggi .= "<li>Connessione al database non riuscita</li>";

    if(isset($_POST['submit'])){

        $newUsername = clearInput($_POST['username']);
        $password = clearInput($_POST['password']);
        $password_rep = clearInput($_POST['password_rep']);
        $fotoProfilo = $_FILES["userimage"]["name"];
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

        if (!preg_match('/^[a-zA-Z0-9]+$/', $newUsername)) {
            $messaggi .= "<li>Username non valido</li>";
        }

        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $messaggi .= "
                    <li>La <span lang='en'>password<span> deve contenere più di 8 caretteri tra questi deve esserci ameno una una lettera maiuscola, una lettera minuscola e un numero.</li>";
        }

        if ($provincia && !preg_match('/^[A-zÀ-ú\s\']+$/', $provincia)) {
            $messaggi .= "<li>Provincia non valida</li>";
        }

        if ($citta && !preg_match('/^[A-zÀ-ú\s\']+$/', $citta)) {
            $messaggi .= "<li>Città non valida</li>";
        }

        if ($CAP && !preg_match('/^[0-9]{5}$/', $CAP)) {
            $messaggi .= "<li>CAP non valido</li>";
        }

        if ($indirizzo && !preg_match('/^[A-zÀ-ú\s\']+$/', $indirizzo)) {
            $messaggi .= "<li>Indirizzo non valido</li>";
        }

        if ($numCivico && !preg_match('/^[0-9]+$/', $numCivico)) {
            $messaggi .= "<li>Numero civico non valido</li>";
        }

        if ($interno && !preg_match('/^[A-zÀ-ú\s\']+$/', $interno)) {
            $messaggi .= "<li>Nome citofono non valido</li>";
        }

        if ($titolare && !preg_match('/^[A-zÀ-ú\s\']+$/', $titolare)) {
            $messaggi .= "<li>Titolare non valido</li>";
        }

        if ($numCarta && !preg_match('/^[0-9]{16}/', $numCarta)) {
            $messaggi .= "<li>Numero carta non valido</li>";
        }

        if ($cvv && !preg_match('/^[0-9]{3}$/', $cvv)) {
            $messaggi .= "<li>Cvv non valido</li>";
        }

        if ($password_rep != $password){
            $messaggi .= "<li>Le <span lang='en'>password </span>inserite non corrispondono</li>";               
        }

        if ($newUsername != $username && $connessione->checkUsername($newUsername)) {
            $messaggi .= "<li>Username già utilizzato! Provare di nuovo</li>";
        }

        if(!$messaggi){
            $connessione = new DBAccess();
            if($connessione->connOk()){

                if ($fotoProfilo == null) {
                    $fotoProfilo = $riga['fotoProfilo'];
                }
                    $connessione->updateUserData($username, $newUsername, $password, $fotoProfilo, $provincia, $citta, $CAP, $indirizzo, $numCivico, $interno, $numCarta, $titolare, $meseScadenza, $annoScadenza, $cvv);
                    $connessione->closeDBConnection();
            
                if ($fotoProfilo != $riga['fotoProfilo']) {
                    $targetDir = "profilo/";
                    $targetFilePath = $targetDir . $fotoProfilo;
                    copy($_FILES["userimage"]["tmp_name"], $targetFilePath);
                }
            
                    header('Location: area_personale.php');
                    exit;
            }
            else{
                $messaggi .= "<li>Connessione al database non riuscita</li>";
            }
        }
    }
  
    $htmlmodificaprofilo = creaHtmlProfilo($riga, $messaggi);
    $paginaHTML = str_replace('<htmlmodificaprofilo/>', $htmlmodificaprofilo, $paginaHTML);
    echo $paginaHTML;

?>