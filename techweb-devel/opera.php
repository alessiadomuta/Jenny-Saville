<?php

require_once "connessione.php"; 

$paginaHTML = file_get_contents("opera.html");

use DB\DBAccess;

$connessione = new DBAccess();

$idOpera = $_GET['id'];
$htmlOpera = "";
$opere = "";

$connessione = new DBAccess();
if($connessione->connOk()){

    $opera = $connessione->getRowTable('opere WHERE id="'.$idOpera.'"');
    if($opera == null){
        header("Location: error404.html");
        exit;
    }
    $connessione->closeDBConnection();

    if($opera != null){   

        $htmlOpera .= 
        '<nav id="breadcrumb" aria-label="percorso">
            <p>Ti trovi in: <a href="home.html"><span lang="en">Home</span></a> &gt; &gt; <a href="opere.html">Opere</a> &gt; &gt; '.$opera['titolo'].' </p>
        </nav>

        <main>
        <div id="primoContenuto" class="info">
            <h2>'.$opera['titolo'].'</h2>

            <div id="pagina_opera" class="flex_column">

                <div class="flex_row">
                    <img src="'.$opera['immagine'].'" alt=""/>
                    <div>
                        <h3>Caratteristiche</h3>
                        <dl class="flex_column no_gap">

                            <dt>Titolo:</dt>
                            <dd>'.$opera['titolo'].'</dd>
                            <dt>Autrice:</dt>
                            <dd>'.$opera['autore'].'</dd>
                            <dt>Data:</dt>
                            <dd>'.$opera['data'].'</dd>
                            <dt>Tecnica:</dt>
                            <dd>'.$opera['tecnica'].'</dd>
                            <dt>Dimensioni:</dt>
                            <dd>'.$opera['larghezza'].' x '.$opera['altezza'].' <abbr title="centimetri">cm</abbr></dd>

                        </dl>
                    </div>

                </div>

                <h3>Descrizione</h3>
                <p>'.$opera['descrizione'].'</p>

            </div>

        </div>';
        $paginaHTML = str_replace("<kwOpera/>", $opera['keywords'], $paginaHTML);
    }
    else{
        $htmlOpera = "<p> Nessun opera presente. </p>";
    }
}
else{
    $htmlOpera = "<p>I sistemi sono momentaneamente fuori servizio, ci scusiamo per il disagio.</p>";
}

echo str_replace("<htmlopera/>", $htmlOpera, $paginaHTML);
