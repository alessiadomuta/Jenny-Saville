<?php
    session_start();

    if (isset($_SESSION['utente'])) {
        header('Location: area_personale.php');
        exit;
    }

    require_once "connessione.php";
    require_once "clear-input.php";

    $paginaHTML = file_get_contents("login.html");
    $messaggi = "";

    use DB\DBAccess;

    $username = "";
    $password = "";
    $messaggi = "";

    if(isset($_POST['submit'])){
        
        $username = clearInput($_POST['username']);
        $password = clearInput($_POST['password']);

        if(!empty($username) && !empty($password)){
            
            $connessione = new DBAccess();
            if($connessione->connOk()){

                $result = $connessione->checkLogin($username, $password);
                if($result!=null){
                    $_SESSION['utente'] = $result['username'];
                    $connessione->closeDBConnection();
                    header("Location: area_personale.php");
                    exit;
                }
                else{
                    $connessione->closeDBConnection();
                    $messaggi .= "<li>Credenziali errate</li>";                   
                }
            }
            else
                $messaggi .= "<li>Connessione al database non riuscita</li>";
        }    
        else
            $messaggi .= "<li>Compilare tutti i campi richiesti</li>";
            

    }

    if($messaggi != ""){
        $messaggi = "<div class = \"error\"><ul class=\"flex_column no_gap\">" . $messaggi . "</ul> </div>";
    }

    $paginaHTML = str_replace('<messaggi/>', $messaggi, $paginaHTML);
    echo $paginaHTML;
?>