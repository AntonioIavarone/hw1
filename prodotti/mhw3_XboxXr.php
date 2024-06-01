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
              header('Location: mhw3_xboxxr.php?id='.$id_prodotto.'&prezzo='.$prezzo);
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
        <link rel="stylesheet" href="mhw3_xboxXr.css">
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
                    <div class="logo">
                        <image src="../immagini/logo_microsoft_black.png"></image>
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
                                echo "<a href='../homeworkv2/login.php'>Login</a>";
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
                <h1>La nuova Xbox Series X (ricondizionato certificato)</h1>
                <p>Più veloce. Più potente.</p>
            </div>
        </div>

        <div class="prodotto">
            <div class="contenitore">
                <div class="immagine">
                    <image src="../immagini/xboxXr.webp"></image>
                </div>
                <div class="descrizione">
                    <h1>Xbox Series X (ricondizionato certificato)</h1>
                    <span>Vi presentiamo Xbox Series X, la console più veloce e potente di sempre, progettata per una generazione di console che vede il giocatore al centro ...</span>
                    <br>
                    <a href>Altro</a> 
                    <p>Risparmia il 20% su controller wireless Xbox selezionati</p>
                    <p>Ottieni un extra controller wireless a un prezzo speciale per un periodo di tempo limitato.</p>
                </div>
                <div class="compra">
                    <h1>A partire da 469,99 €</h1>
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
                    <p>Una fattura semplificata sarà disponibile dopo l'acquisto. Vedi note a piè di pagina.</p>
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
                            <a>CPU: 8 core @ 3,8 GHz (3,66 GHz con SMT) CPU Zen 2 personalizzata</a>
                            <a>GPU: 12 TFLOPS, 52 CU @1,825 GHz GPU RDNA 2 personalizzata</a>
                            <a>Dimensioni Die SOC: 360,45 mm</a>
                        </div>

                        <div class="nome"><h2>Spazio di archiviazione e memoria</h2></div>
                        <div class="caratteristiche">
                            <a>Memoria: GDDR6 da 16 GB con bus a 320 bit</a>
                            <a>Larghezza di banda della memoria: 10 GB @ 560 GB/s, 6 GB @ 336 GB/s</a>
                            <a>Spazio di archiviazione interno: SSD NVME personalizzato da 1 TB</a>
                            <a>Velocità effettiva I/O: 2,4 GB/s (raw), 4,8 GB/s (compresso, con blocco di decompressione hardware personalizzato)</a>
                            <a>Spazio di archiviazione espandibile: il supporto per scheda di espansione Seagate da 1 TB per Xbox Serie X|S corrisponde esattamente all'archiviazione interna (venduto separatamente). Supporto per HDD USB 3.1 esterno (venduto separatamente).</a>
                        </div>

                        <div class="nome"><h2>Capacità video</h2></div>
                        <div class="caratteristiche">
                            <a>Risoluzione di gioco: True 4K</a>
                            <a>High Dynamic Range: fino a 8K HDR</a>
                            <a>Unità ottica: 4K UHD Blu-Ray</a>
                            <a>Obiettivo prestazioni: fino a 120 FPS</a>
                            <a>Funzionalità HDMI: modalità auto a bassa latenza.</a>
                            <a>Frequenza di aggiornamento variabile HDMI. AMD FreeSync.</a>
                        </div>

                        <div class="nome"><h2>Funzionalità audio</h2></div>
                        <div class="caratteristiche">
                            <a>Dolby Digital 5.1</a>
                            <a>DTS 5.1</a>
                            <a>Dolby TrueHD con Atmos</a>
                            <a>Fino a 7,1 L-PCM</a>
                        </div>

                        <div class="nome"><h2>Porte e connettività</h2></div>
                        <div class="caratteristiche">
                            <a>HDMI: 1 porta HDMI 2.1</a>
                            <a>USB: 3 porte USB 3.1 Gen 1</a>
                            <a>Wireless: 802.11ac dual band</a>
                            <a>Ethernet: 802.3 10/100/1000</a>
                            <a>Accessori radio: radio wireless dual band dedicata per Xbox</a>
                        </div>

                        <div class="nome"><h2>Dimensioni</h2></div>
                        <div class="caratteristiche">
                            <a>15,1 x 15,1 x 30,1 cm</a>
                        </div>

                        <div class="nome"><h2>Peso</h2></div>
                        <div class="caratteristiche">
                            <a>4,4 kg</a>
                        </div>

                        <div class="nome"><h2>Garanzia</h2></div>
                        <div class="caratteristiche">
                            <a>1 anno di garanzia limitata</a>
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