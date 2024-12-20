<?php
    session_start();
    
    if (isset($_SESSION['utente'])) {
        header('Location: area_personale.php');
        exit;
    }

    require_once "connessione.php";
    require_once "clear-input.php";
    $paginaHTML = file_get_contents("registrazione.html");
    $messaggi = "";

    use DB\DBAccess;

    $username = "";
    $email = "";
    $password = "";
    $password_rep = "";


    if(isset($_POST['submit'])){

        $username = clearInput($_POST['username']);
        $email = clearInput($_POST['email']);
        $password = clearInput($_POST['password']);
        $password_rep = clearInput($_POST['password_rep']);


        if(!preg_match('/^[a-zA-Z0-9]+$/', $username))
            $messaggi .= "<li>Lo username può contentere solo numeri o lettere maiuscole o minuscole</li>";
        
        if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email))
            $messaggi .= "<li> L'email non è valida</li>";

        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $messaggi .= "<li><ul id='psw-message'> La <span lang='en'>password<span> deve contenere: 
                <li>almeno una lettera maiuscola</li>
                <li>almeno una lettera minuscola</li>
                <li>almeno un numero</li>
                <li>più di 8 caratteri</li>
                </ul></li>";
        }
        
        if($password_rep != $password)
            $messaggi .= "<li>Le <span lang='en'>password </span>inserite non corrispondono</li>";
        
        if($messaggi == ""){
            $connessione = new DBAccess();        
            if($connessione->connOk()){

                if($connessione->checkUsername($username))
                    $messaggi .= "<li>Username già utilizzato! Provare di nuovo</li>";
                if($connessione->checkEmail($email))
                    $messaggi .= "<li>e-mail già utilizzata! Provare di nuovo</li>";
                
                if($messaggi == ""){
                    $connessione->insertNewUser($email, $username, $password);
                    
                    $connessione->closeDBConnection();
                    header('Location: area_personale.php');
                    $_SESSION['utente'] = $username;
                }
                else
                    $connessione->closeDBConnection();
            }
            else
                $messaggi = "<li>Connessione al database non riuscita</li>";
        }

    }

    if($messaggi != ""){
        $messaggi = "<div class = \"error\"><ul class=\"flex_column no_gap\">" . $messaggi . "</ul> </div>";
    }
    $paginaHTML = str_replace('<messaggi/>', $messaggi, $paginaHTML);
    echo $paginaHTML;

?>