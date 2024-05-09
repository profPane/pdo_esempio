<?php
require_once "../db/connDB.php";
//controllo se sono arrivato a questa pagina tramite un POST
    //mi devo comportare da pagina di risposta?
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        // controllo che i campi dati che mi servono siano stati riempiti
        //prendo il campo "nome" del modulo, se esiste
        if (empty($_REQUEST['nome'])) { 
            echo "dati del POST vuoti o non corrispondenti";
        } else { //dati presenti
            // codice di inserimento dati nel database
            try {
                $prova = 
                $sql = "INSERT INTO prodotti (nome, prezzo) VALUES ('{$_REQUEST['nome']}', {$_REQUEST['prezzo']})";
                $result = $pdo->exec($sql);
                echo '<script> alert("Inserimento con successo")</script>';
                //visualizzo la tabella
?>
                <div>Dati in tabella</div>
                <embed type="text/html" src="queryTAB.php" width="500" height="200">
<?php
            } catch (Exception $e) {
                echo '<script> alert("Errore inserimento dei dati")</script>';
                //echo "Errore nell'inserimento dei dati <br />";
                //echo $e;
            }
        } //dati presenti

    } else { //non arrivo da un POST quindi mostro il modulo inserimento dati in HTML
?>
    <!-- form di inserimento dati in html -->
    <html>
        <head></head>
        <body>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                <input type="text" name="nome" id="nome" placeholder="Inserisci il nome prodotto" style="width: 30%;"/>
                <input type="text" name="prezzo" id="prezzo" placeholder="0000.00" style="width: 15%;"/>
                <input type="submit" value="Aggiungi prodotto">
            </form>
        </body>
    </html>
<?php 
    } //chiusura else 
?>