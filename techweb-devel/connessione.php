<?php

namespace DB;

class DBAccess{

    //private const HOST_DB = "127.0.0.1";
    //private const DATABASE_NAME = "prova";
    //private const USERNAME = "root";
    //private const PASSWORD = "";

    private const  HOST_DB = "127.0.0.1" ; #le pagine si trovano sullo stesso server del DB quindi sono in locale
    private const  DATABASE_NAME = "rrossi";
    private const  USERNAME = "rrossi";
    private const  PASSWORD = "zeit0aShie6tu2Th";

    //private const HOST_DB = "127.0.0.1";
    //private const DATABASE_NAME = "rrossi";
    //private const USERNAME = "rrossi";
    //private const PASSWORD = "zeit0aShie6tu2Th";
    //private const PASSWORD = "noo1ace8hoo3keQu";

    private $connection;

    public function __construct(){
        $this->connection = mysqli_connect(DBAccess::HOST_DB, DBAccess::USERNAME, 
        DBAccess::PASSWORD, DBAccess::DATABASE_NAME);
    }
    
    
    public function getConnection(){
        return $this->connection;
    } 

    public function connOk(){
        mysqli_report(MYSQLI_REPORT_ERROR);

        if(mysqli_connect_errno()){
            return false;
        }
        else{
            return true;
        }
    }

    public function insertNewOrder($username, $provincia, $citta, $CAP, 
    $indirizzo, $numCivico, $interno, $titolare, $annoScadenza, $meseScadenza, $cvv){

        $firstQuery = "SELECT id_prodotto, quantita FROM carrello WHERE username = \"$username\"";
        $firstQueryResult = mysqli_query($this->connection, $firstQuery) or 
           die("Errore nell'esecuzione della query " .mysqli_error($this->connection));     
           
        
        if(mysqli_num_rows($firstQueryResult)==0){
            return null;
        }
        else{
            $result = array();
            while($riga = mysqli_fetch_assoc($firstQueryResult)){
                array_push($result, $riga);
            }
            $firstQueryResult->free();
            $id = date("Ymdhis");
            $data = date("Y-m-d");
            foreach($result as $prodotto){
                $id_prodotto = $prodotto['id_prodotto'];
                $quantita = $prodotto['quantita'];

                $query = "INSERT INTO ordine VALUES (\"$id\", \"$quantita\", \"$username\", \"$id_prodotto\", \"$data\", \"$provincia\", \"$citta\", \"$CAP\", 
                \"$indirizzo\", \"$numCivico\", \"$interno\", \"$titolare\", \"$annoScadenza\", 
                \"$meseScadenza\", \"$cvv\")";
                $queryResult = mysqli_query($this->connection, $query) or 
                            die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
            }

        }
    }

    public function checkLogin($username, $password){
        $query = "SELECT username FROM utente
                WHERE (username = \"$username\" AND password = \"$password\")
                OR (email = \"$username\" AND password = \"$password\")";
        $queryResult = mysqli_query($this->connection, $query) or 
           die("Errore nell'esecuzione della query " .mysqli_error($this->connection));

        if(mysqli_num_rows($queryResult) == 1){
            $riga = mysqli_fetch_assoc($queryResult);
            $queryResult->free();
            return $riga;
        }
        else{
            return null;
        }
    }

    public function checkUsername($username){
        $query = "SELECT username FROM utente WHERE username = \"$username\"";
        $queryResult = mysqli_query($this->connection, $query) or 
                    die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
    
        if(mysqli_num_rows($queryResult) == 1)
            return true;
        else
            return false;
    
    }

    public function checkEmail($email){
        $query = "SELECT email FROM utente WHERE email = \"$email\"";
        $queryResult = mysqli_query($this->connection, $query) or 
                    die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
    
        if(mysqli_num_rows($queryResult) == 1)
            return true;
        else
            return false;
    
    }

    public function updateUserData($username,$newUsername,$password, $fotoProfilo, $provincia, $citta, $CAP, $indirizzo, $numCivico, $interno, $numCarta, $titolare, $meseScadenza, $annoScadenza, $cvv){
        $query = "UPDATE utente SET username=\"$newUsername\",password=\"$password\",fotoProfilo=\"$fotoProfilo\",provincia=\"$provincia\",citta=\"$citta\",CAP=\"$CAP\",indirizzo=\"$indirizzo\", numCivico=\"$numCivico\", interno=\"$interno\", numCarta=\"$numCarta\", titolare=\"$titolare\", meseScadenza=\"$meseScadenza\", annoScadenza=\"$annoScadenza\", cvv=\"$cvv\" WHERE utente.username=\"$username\"";
        mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " . mysqli_error($this->connection));
    }

    public function insertNewUser($email, $username, $password){
        $query = "INSERT INTO utente (`email`, `username`, `password`, `fotoProfilo`) VALUES ( \"$email\", \"$username\", \"$password\", \"icon1.png\")";
        $queryResult = mysqli_query($this->connection, $query) or 
                    die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
    }

    public function getListFromTable(string $tableName){
        $query= "SELECT * FROM ". $tableName;

        $queryResult = mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));

        if(mysqli_num_rows($queryResult)==0){
            return null;
        }
        else{
            $result = array();
            while($riga = mysqli_fetch_assoc($queryResult)){
                array_push($result, $riga);
            }
            $queryResult->free();
            return $result;
        }
    }

    public function getRowTable(string $tableName){
        $query= "SELECT * FROM ". $tableName;


        $queryResult = mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));

        if(mysqli_num_rows($queryResult) == 1){
            $riga = mysqli_fetch_assoc($queryResult);
            return $riga;
        }
        else{
            return null;
        }
    }
    
    public function addToBasket($username, $id_prodotto){
        $queryProd = "SELECT * FROM carrello WHERE username=\"$username\" AND id_prodotto=\"$id_prodotto\"";
        $prodNelCarrello = mysqli_query($this->connection, $queryProd) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));

        if(mysqli_num_rows($prodNelCarrello)){
            $query = "UPDATE carrello SET quantita = quantita+1 WHERE username=\"$username\" AND id_prodotto=\"$id_prodotto\"";
        } else {
            $query = "INSERT INTO carrello VALUES (NULL, \"$username\", \"$id_prodotto\", 1)";
        }
        mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " . mysqli_error($this->connection));
    }

    public function addReview($product, $username, $text, $stars){
        $query = "INSERT INTO recensione VALUES (NULL, \"$product\", \"$username\", \"$text\", \"$stars\")";
        mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " . mysqli_error($this->connection));
    
        $media = "SELECT AVG(stelle) as average FROM recensione WHERE prodotto = \"$product\"";
        $mediaResult = mysqli_query($this->connection, $media) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
        
        $riga = mysqli_fetch_assoc($mediaResult);
        $average = (int)$riga['average'];
        
        $altraQuery = "UPDATE prodotto SET stelle = \"$average\" WHERE categoria = \"$product\"";
        mysqli_query($this->connection, $altraQuery) or die("Errore nell'esecuzione della query " . mysqli_error($this->connection));
    }

    public function changeProductQuantity($username, $id, $quantity){
        $queryProd = "SELECT * FROM carrello JOIN prodotto ON carrello.id_prodotto = prodotto.id_prodotto 
        WHERE username=\"$username\" AND id_carrello =\"$id\"";
        $prodNelCarrello = mysqli_query($this->connection, $queryProd) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));

        if(mysqli_num_rows($prodNelCarrello)){
            $query = "UPDATE carrello JOIN prodotto ON carrello.id_prodotto = prodotto.id_prodotto 
            SET quantita = \"$quantity\" WHERE username=\"$username\" AND id_carrello =\"$id\"";
        } else {
            return false;
        }
        mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " . mysqli_error($this->connection));
        return true;
    }

    public function removeFromCart($username, $id){
        $query = "DELETE FROM carrello WHERE username=\"$username\" AND id_carrello =\"$id\"";
        mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
    }

    public function emptyCart($username){
        $query = "DELETE FROM carrello WHERE username=\"$username\"";
        mysqli_query($this->connection, $query) or die("Errore nell'esecuzione della query " .mysqli_error($this->connection));
    }

    public function closeDBConnection(){
        mysqli_close($this->connection);
    }



}

?>
