<?php
function creaHtmlProfilo(array $user){
    $html = '<div class="info positivo none">
    <p>Il profilo è stato aggiornato correttamente!</p>
</div>
<h2>Il mio profilo</h2>

<dl id="datiprofilo" class="flex_column">
    <dt id="foto_profilo">Foto profilo:</dt>
    <dd><img src="profilo/'.$user['fotoProfilo'].'" alt=""></dd>
    <dt>Username:</dt>
    <dd>'.$user['username'].'</dd>
    <dt>E-mail:</dt>
    <dd>'.$user['email'].'</dd>
    <dt id="indirizzo">Indirizzo</dt>
    <dd>
        <dl class="flex_column flex_wrap no_gap">
            <dt>Provincia</dt><dd>'.$user['provincia'].'</dd>
            <dt>Città</dt><dd>'.$user['citta'].'</dd>
            <dt>CAP</dt><dd>'.$user['CAP'].'</dd>
            <dt>Indirizzo</dt><dd>'.$user['indirizzo'].'</dd>
            <dt>Numero&nbsp;civico</dt><dd>'.$user['numCivico'].'</dd>
            <dt>Interno</dt><dd>'.$user['interno'].'</dd>
        </dl>
    </dd>
    <dt id="pagamento">Metodo di pagamento</dt>
    <dd>
        <dl class="flex_column flex_wrap no_gap">
            <dt>Numero&nbsp;sulla&nbsp;carta</dt><dd>'.$user['numCarta'].'</dd>
            <dt>Titolare&nbsp;della&nbsp;carta</dt><dd>'.$user['titolare'].'</dd>
            <dt>Data&nbsp;di&nbsp;scadenza</dt><dd>'.$user['meseScadenza'].'/'.$user['annoScadenza'].'</dd>
        </dl>
    </dd>
</dl>

<div class="flex_row flex_wrap">
    <a href="modifica_profilo.php" class="infoButton">Modifica i miei dati</a>
    <a href="logout.php" class="infoButton">Effettua il <span lang= "en">logout</span></a>
</div>';
    return $html;
}
?>