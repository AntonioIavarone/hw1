<!DOCTYPE html>
<?php
    session_start();
    $id_prodotto=$_GET['id'];
    $prezzo=$_GET['prezzo'];

    if(isset ($_SESSION['id'])){
        $id_utente=$_SESSION['id'];
        
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_submitted'])){
        if(isset($_SESSION['id'])){
            $conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());
    
            $query = "INSERT INTO carrello(ID_utente,ID_prodotto,Qta,Prezzo) VALUES ('$id_utente','$id_prodotto',1,'$prezzo')";
            
            echo 'ok';
            if (mysqli_query($conn, $query)) {
              header('Location: mhw3_xboxsr.php?id='.$id_prodotto.'&prezzo='.$prezzo);
               exit;
            } else {
               echo "Errore nell'aggiunta al carrello: " . mysqli_error($conn);
            }
        }else {
            header('Location:../login.php');
            exit;
        }    
    }
       
?>
<html>
    <head>
        <title>Surface Pro 10</title>
        <link rel="stylesheet" href="mhw3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="mhw3_xboxsr.css">
        <script src="cerca.js" defer></script>
        
    </head>
    <body>
        <header>
            <div>
                <nav class="container">
                    <div class="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="logo" href="../immagini/logo.jpeg">
                        <image src="../immagini/logo.jpeg"></image>
                    </div>
                    <div class="testa">
                        <a href='../index.php'>Home</a>
                        <a href="../mhw3_pagina2.php">Surface</a>
                        <a>Accessori</a>
                        <a href='../mhw3_pagina3.php'>Xbox</a>
                        <a>Contattaci</a>
                    </div>
                    <div class="icone">
                        <a>Tutti i siti Microsoft</a>
                        <a id='cerca' href="#">Cerca</a>
                        <span class="material-symbols-outlined">search</span>
                        <a href='../carrello.php'>Carrello</a>
                        <span class="material-symbols-outlined">shopping_cart</span>
                        <?php
                            if(isset($_SESSION["username"]) &&isset($_SESSION["email"]))
                            {
                                echo $_SESSION["username"];
                                echo '<a href="../logout.php">Logout</a>';
                            }else{
                                echo "<a href='../login.php'>Login</a>";
                                echo "<span class='material-symbols-outlined'>login</span>";
                            }
                        ?>
                    </div>

                    <div id="barra" class="nascosto">
                        <form method='post'>
                            <input type="text" id="contenuto_barra" placeholder="Inserisci il termine di ricerca">
                            <div class="bottone">
                                <input id="bottone" type="submit" class="btn" value="Cerca">
                            </div>
                        </form>
                        <a id='annulla' class="btn">Annulla</a>
                    </div>
                </nav>
            </div>
        </header>

        <div class="banner">

            <div class="testo-su-immagine">
                <h1>Xbox Series S (ricondizionata certificata)</h1>
                <p>Pronti all'azione</p>
            </div>
        </div>

        <div class="prodotto">
            <div class="contenitore">
                <div class="immagine">
                    <image src="../immagini/xbox_series_s.avif"></image>
                </div>
                <div class="descrizione">
                    <h1>Xbox Series S (ricondizionata certificata)</h1>
                    <span>Presentazione della Xbox Series S (ricondizionata certificata), la Xbox più piccola e più elegante di sempre. Con dimensioni del 60% inferiori rispetto a Xbox Series X, offre la velocità e le prestazioni di una console completamente digitale di nuova generazione a un prezzo accessibile. Limite di 3 per cliente.</span>
                    <p>Risparmia il 20% su controller wireless Xbox selezionati</p>
                    <p>Ottieni un extra controller wireless a un prezzo speciale per un periodo di tempo limitato.</p>
                </div>
                <div class="compra">
                    <h1>A partire da 249,99 €</h1>
                    <p>Paga in 3 rate con PayPal.​</p>

                    <form method='POST' action=''>
                        <input type="hidden" name="form_submitted" value="1">
                        
                        <?php
                        if(!isset ($_SESSION['id'])){
                            echo "<button type='submit' class='btn' ><a href='../login.php'>Accedi per mettere nel carrello</a></button>";
                            
                        }else
                            echo "<button type='submit' class='btn'>Aggiungi al carrello</button>";
                        
                        ?>
                    </form>

                    <p>Spedizione standard gratuita. Resi gratuiti.</p>
                    <p>Limite di 3 per cliente.</p>
                </div>
            </div>
            <div class="container2">
                <a>I clienti con disabilità possono avere diritto al rimborso totale dell'IVA. Per ulteriori informazioni, contatta il Supporto di Microsoft Store.</a>
            </div>
        </div>


       <div class="specifiche">
            <div class="elenco">
                <div class="left">
                    <table>
                        <div class="nome"><h2>Processore</h2></div>
                        <div class="caratteristiche">
                            <a>CPU: 8 core a 3,6 GHz (3,4 GHz con SMT) CPU Zen 2 personalizzata</a>
                            <a>GPU: 4 TFLOPS, 20 CU a 1.565 GHz GPU RDNA 2 personalizzata</a>
                            <a>Dimensioni Die SOC: 197,05 mm</a>
                        </div>

                        <div class="nome"><h2>Memoria e spazio di archiviazione</h2></div>
                        <div class="caratteristiche">
                            <a>Memoria: GDDR6 da 10 GB con bus a 128 bit</a>
                            <a>Larghezza di banda: 8 GB a 224 GB/s, 2 GB a 56 GB/s</a>
                            <a>Spazio di archiviazione interno: unità SSD NVME personalizzata da 512 GB</a>
                            <a>Velocità effettiva I/O: 2,4 GB/s (raw), 4,8 GB/s (compresso, con blocco di decompressione hardware personalizzato)</a>
                            <a>Spazio di archiviazione espandibile: il supporto per scheda di espansione Seagate da 1 TB per Xbox Serie X|S corrisponde esattamente all'archiviazione interna (venduto separatamente). Supporto per HDD USB 3.1 esterno (venduto separatamente).</a>
                        </div>

                        <div class="nome"><h2>Funzionalità video</h2></div>
                        <div class="caratteristiche">
                            <a>Risoluzione di gioco: 1440p</a>
                            <a>Obiettivo prestazioni: fino a 120 fps</a>
                            <a>Funzionalità HDMI: modalità auto a bassa latenza.</a>
                            <a>Frequenza di aggiornamento variabile HDMI. AMD FreeSync.</a>
                        </div>

                        <div class="nome"><h2>Funzionalità audio</h2></div>
                        <div class="caratteristiche">
                            <a>Dolby Digital 5.1</a>
                            <a>DTS 5.1</a>
                            <a>Dolby TrueHD con Atmos</a>
                            <a>L-PCM, fino a 7.1</a>
                        </div>

                        <div class="nome"><h2>Porte e connettività</h2></div>
                        <div class="caratteristiche">
                            <a>HDMI: 1 porta HDMI 2.1</a>
                            <a>USB: 3 porte USB 3.1 di prima generazione</a>
                            <a>Wireless: 802.11ac dual band</a>
                            <a>Ethernet: 802.3 10/100/1000</a>
                            <a>Accessori radio: radio wireless dual band dedicata per Xbox</a>
                        </div>

                        <div class="nome"><h2>Dimensioni</h2></div>
                        <div class="caratteristiche">
                            <a>2,55" x 5,94" x 10,82" (6,5 cm x 15,1 cm x 27,5 cm)</a>
                        </div>

                        <div class="nome"><h2>Peso</h2></div>
                        <div class="caratteristiche">
                            <a>4,25 libbre (1,92 kg)</a>
                        </div>

                        <div class="nome"><h2>Garanzia</h2></div>
                        <div class="caratteristiche">
                            <a>Garanzia limitata di 90 giorni**</a>
                        </div>

                    </table>
                </div>
            </div>
       </div>

        <footer>
            <div class="foot">
                <div class="box">
                    <div class="head">Le novità</div>
                    <div class="lista">
                        <a>Surface laptop studio 2</a>
                        <a>Surface laptop GO 3</a>
                        <a>Surfare PRO 9</a>
                        <a>Surface Laptop 5</a>
                        <a>Microsoft copilot</a>
                        <a>Microsoft 365</a>
                        <a>App di Windows 11</a>
                    </div>
                </div>
                <div class="box">
                    <div class="head">Microsoft Store</div>
                    <div class="lista">
                        <a>Profilo account</a>
                        <a>Download Center</a>
                        <a>Supporto Microsoft Store</a>
                        <a>Resi</a>
                        <a>Monitoraggio ordini</a>
                        <a>Riciclaggio</a>
                        <a>Garanzie commerciali</a>
                    </div>
                </div>
                <div class="box">
                    <div class="head">Formazione</div>
                    <div class="lista">
                        <a>Microsoft education</a>
                        <a>Dispositivi per l'istruzione</a>
                        <a>Microsoft Teams per l'istruzione</a>
                        <a>Microsoft 365 education</a>
                        <a>Formazione e svilppo per insegnanti</a>
                        <a>Offerte per studenti e genitori</a>
                        <a>Azure per studenti</a>
                    </div>
                </div>
                <div class="box">
                    <div class="head">Aziende</div>
                    <div class="lista">
                        <a>Microsoft Cloud</a>
                        <a>Microsoft Security</a>
                        <a>Azure</a>
                        <a>Dynamic 365</a>
                        <a>Microsoft 365</a>
                        <a>Copilot for Microsoft 365</a>
                        <a>Microsoft Teams</a>
                        <a>Piccole imprese</a>
                    </div>
                </div>
                <div class="box">
                    <div class="head">Sviluppatori IT</div>
                    <div class="lista">
                        <a>Centro per sviluppatori</a>
                        <a>Documentazione</a>
                        <a>Microsoft Learn</a>
                        <a>Azure Marketplace</a>
                        <a>AppSource</a>
                        <a>Microsoft Power Platform</a>
                        <a>Visual Studio</a>
                    </div>
                </div>
                <div class="box">
                    <div class="head">Azienda</div>
                    <div class="lista">
                        <a>Opportunità di carriera</a>
                        <a>Informazioni su Microsoft</a>
                        <a>Notizie aziendali</a>
                        <a>Privacy in Microsoft</a>
                        <a>Investitori</a>
                        <a>Accessibilità</a>
                        <a>Sostenibilità</a>
                    </div>
                </div>
            </div>
            <div class="base">
                <a>Italiano(Italia)</a>
                <a>Riferimenti societari</a>
                <a>Contatta microsoft</a>
                <a>Privacy</a>
                <a>Gestisci i cookie</a>
                <a>Condizioni per l'utilizzo</a>
                <a>Marchi</a>
                <a>Informazioni sulle inserzioni</a>
                <a>EU Compliance DoCs</a>
                <a>Microsoft 2024</a>
            </div>

        </footer>
    </body>
</html>