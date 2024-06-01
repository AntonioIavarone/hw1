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
              header('Location: mhw3_SurfaceLaptop6.php?id='.$id_prodotto.'&prezzo='.$prezzo);
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
        <link rel="stylesheet" href="mhw3_SurfaceLaptop6.css">
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
                <h1>Il laptop aziendale più produttivo di sempre, progettato per grandi prestazioni</h1>
                <p></p>
                <a class="btn">Crea il tuo dispositivo</a>
            </div>
        </div>

        <div class="prodotto">
            <div class="contenitore">
                <div class="immagine">
                    <image src="../immagini/surfacepro6_pagina2.avif"></image>
                </div>
                <div class="descrizione">
                    <h1>Surface Laptop 6 per le aziende</h1>
                    <p>Su questo dispositivo è precaricato Windows 11 Pro. </p> <a href>Scopri di più</a> <br>
                    <span>Raddoppia le prestazioni³ con i nuovi processori Intel® Core™ Ultra (serie H), 18,5 ore di autonomia,⁴ e strumenti basati sull'IA per semplificare le attività quotidiane, il tutto in un design lineare. Disponibile nei colori Platino e Nero⁵ e con touchscreen antiriflesso da 13,5 o da 15 pollici.</span>
                    <p>Acquista per la tua azienda su Microsoft Store</p>
                    <p>Trova il meglio di Surface su Microsoft Store: consegna standard e reso gratuiti, promessa sui prezzi, permuta, cambio anticipato e altro ancora.</p>
                </div>
                <div class="compra">
                    <h1>A partire da 1.429,00 €</h1>
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
                <h2>Hai bisogno di aiuto con il tuo ordine? Siamo qui per assisterti.</h2>
                <a>Ottieni una fattura con i dettagli IVA della tua azienda; Sblocca sconti aziendali (per ordini di grande volume); Approfitta dell'iscrizione ad AutoPilot senza costi aggiuntivi; O per qualsiasi altra domanda sul tuo ordine, chiamaci al 800-598979 (chiamata gratuita), dal lunedì al venerdì, dalle 9:00 alle 18:00.</a>
            </div>
        </div>


       <div class="specifiche">
            <div class="elenco">
                <div class="left">
                    <table>
                        <div class="nome"><h2>Processore</h2></div>
                        <div class="caratteristiche">
                            <li>Processore Intel Core™ Ultra 5 135H </li>
                            <li>Processore Intel® Core™ Ultra 7 165H</li>
                            <li>NPU: IntelFootnote® AI Boost</li>
                        </div>

                        <div class="nome"><h2>Grafica</h2></div>
                        <div class="caratteristiche">
                            <li>Memoria da 8 GB: Grafica Intel®</li>
                            <li>Memoria da 16 GB, 32 GB o 64 GB: Grafica Intel® Arc™</li>
                        </div>

                        <div class="nome"><h2>Memoria e spazio di archiviazione</h2></div>
                        <div class="caratteristiche">
                            <li>Opzioni memoria:8 GB, 16 GB, 32 GB, 64 GB (LPDDR5x)</li>
                            <li>Opzioni di archiviazione: SSD (unità a stato solido) rimovibile (Gen 4) da 256 GB, 512 GB, 1 TB</li>
                        </div>

                        <div class="nome"><h2>Schermo</h2></div>
                        <div class="caratteristiche">
                            <li>Touchscreen: schermo PixelSense™ da 13,5 pollici</li>
                            <li>Risoluzione: 2256 × 1504 (201 ppi)</li>
                            <li>Proporzioni: 3:2</li>
                            <li>Rapporto di contrasto: 1300:1</li>
                            <li>Profilo colori: sRGB e Avanzato</li>
                            <li>Schermo con colori calibrati singolarmente</li>
                            <li>Colore adattivo</li>
                            <li>Touchscreen: input multitocco a 10 punti</li>
                            <li>Supporto per Dolby Vision IQ™</li>
                            <li>Corning® Gorilla® Glass 5</li>
                            <li>Antiriflesso.</li>
                            <li>Luminosità: SDR 400 nit massima (tipica)</li>
                        </div>

                        <div class="nome"><h2>Dimensioni e peso</h2></div>
                        <div class="caratteristiche">
                            <li>Lunghezza: 308 mm (12,1 pollici)</li>
                            <li>Larghezza: 223 mm (8,8 pollici)</li>
                            <li>Altezza: 16,7 mm (0,66 pollici)</li>
                            <li>Peso: 1,38 kg (3,06 lb)</li>
                        </div>

                        <div class="nome"><h2>Durata della batteria</h2></div>
                        <div class="caratteristiche">
                            <a>Fino a 18,5 ore nelle condizioni di utilizzo tipiche del dispositivo</a>
                        </div>

                        <div class="nome"><h2>Sicurezza</h2></div>
                        <div class="caratteristiche">
                            <li>Chip TPM 2.0 hardware per una sicurezza di livello aziendale e supporto per BitLocker</li>
                            <li>Riconoscimento facciale Windows Hello con Enhanced Sign-In Security (ESS)</li>
                            <li>Autenticazione con lettore di smart card integrato (disponibile su alcuni modelli e in alcuni mercati)</li>
                            <li>PC con memoria centrale protetta e Windows 11</li>
                        </div>

                        <div class="nome"><h2>Fotocamere</h2></div>
                        <div class="caratteristiche">
                            <li>Fotocamera anteriore Surface Studio Full HD</li>
                            <li>Fotocamera per l'autenticazione tramite il riconoscimento del volto con Windows Hello</li>
                        </div>

                        <div class="nome"><h2>Audio</h2></div>
                        <div class="caratteristiche">
                            <li>Due microfoni da studio con focus voce</li>
                            <li>Altoparlanti Omnisonic® con DolbyFootnote® Atmos®9</li>
                            <li>Supporto per Bluetooth® LE Audio</li>
                        </div>

                        <div class="nome"><h2>Porte e ricarica</h2></div>
                        <div class="caratteristiche">
                            <li>USB-C® con USB 4®/ Thunderbolt™ 4</li>
                            <li>Ricarica rapida disponibile con un alimentatore con una potenza minima di 45 W tramite Surface Connect o USB-CFootnote10</li>
                            <li>USB-A 3.1</li>
                            <li>Jack per cuffia da 3,5 mm</li>
                            <li>Porta Surface Connect</li>
                        </div>

                        <div class="nome"><h2>Reti e connettività</h2></div>
                        <div class="caratteristiche">
                            <li>Wi-Fi 6E: compatibile con 802.11axFootnote</li>
                            <li>Tecnologia BluetoothFootnote® Wireless 5.3</li>
                        </div>

                        <div class="nome"><h2>Compatibilità la penna</h2></div>
                        <div class="caratteristiche">
                            <a>Compatibilità con la penna</a>
                            <li>Supporta il protocollo Microsoft Pen Protocol (MPP)</li>
                        </div>

                    </table>
                </div>
                <div class="right">

                    <div class="nome"><h2>Software</h2></div>
                        <div class="caratteristiche">
                            <li>Windows 11 Pro o Windows 10 Pro</li>
                            <li>Microsoft 365 Apps precaricato</li>
                            <li>Versione di prova valida 30 giorni di Microsoft 365 Business Standard, Microsoft 365 Business Premium o Microsoft 365 Apps</li>
                        </div>
                    
                        <div class="nome"><h2>Accessibilità</h2></div>
                        <div class="caratteristiche">
                            <li>Compatibile con Surface Adaptive Kit</li>
                            <li>Compatibile con gli accessori adattivi Microsoft</li>
                            <li>Include le funzionalità di accessibilità di Windows - Ulteriori informazioni Funzionalità di accessibilità | Accessibilità Microsoft</li>
                            <li>Scopri altri dispositivi e prodotti accessibili di Microsoft - Dispositivi e prodotti accessibili per PC e per il gioco | Accessori di tecnologia assistiva - Microsoft Store</li>
                        </div>

                        <div class="nome"><h2>Sostenibilità</h2></div>
                        <div class="caratteristiche">
                            <li>Surface Laptop 6 per le aziende è progettato tenendo a mente la sostenibilità.</li>
                            <a>Più materiali riciclati</a>
                            <li>L'involucro è realizzato con almeno il 25,8% di materiali riciclati, fra cui una lega di alluminio riciclato al 100% e terre rare riciclate al 100%.</li>
                            <a>Maggiore efficienza energetica</a>
                            <li>Certificato ENERGY STAR®</li>
                            <a>Più riparabile</a>
                            <li>Più componenti sostituibili rispetto a Surface Laptop 5 per le aziende. Codice QR integrato per accedere facilmente alle istruzioni</li>
                            <a>L'impegno di Microsoft è ridurre l'impatto ambientale, migliorare la gestione dell'acqua e ridurre i rifiuti entro il 2030. Ulteriori informazioni sulla progettazione orientata alla sostenibilità:</a>
                            <li>Prodotti e soluzioni sostenibili | Microsoft CSR</li>
                            <li>Sostenibilità di Microsoft Surface - Sostenibilità di Microsoft</li>
                        </div>

                        <div class="nome"><h2>Manutenzione</h2></div>
                        <div class="caratteristiche">
                            <a>I componenti sostituibili includono:</a>
                            <li>Struttura dello schermo (inclusa fotocamera)</li>
                            <li>Struttura della tastiera</li>
                            <li>Unità a stato solido rimovibile</li>
                            <li>Batteria</li>
                            <li>Modulo scheda madre (processore principale e memoria principale)</li>
                            <li>Surface Connect</li>
                            <li>Modulo termico</li>
                            <li>Connettore jack audio</li>
                            <li>Altoparlanti</li>
                            <li>Touchpad</li>
                            <li>Involucro</li>
                            <li>Piedini</li>
                        </div>

                        <div class="nome"><h2>Esterno</h2></div>
                        <div class="caratteristiche">
                            <li>Struttura: alluminio anodizzato</li>
                            <li>Colori: Platino o Nero</li>
                        </div>

                        <div class="nome"><h2>Sensori</h2></div>
                        <div class="caratteristiche">
                            <li>Sensore di luce ambientale</li>
                        </div>

                        <div class="nome"><h2>Contenuto della confezione</h2></div>
                        <div class="caratteristiche">
                            <li>Surface Pro 10 per le aziende</li>
                            <li>Alimentatore:13,5 pollici: 39 W, 15 pollici: 65 W</li>
                            <li>Guida introduttiva</li>
                            <li>Documenti su sicurezza e garanzia</li>
                        </div>

                        <div class="nome"><h2>Layout della tastiera</h2></div>
                        <div class="caratteristiche">
                            <li>Attivazione: tasti mobili</li>
                            <li>Layout: QWERTY (Italiana), riga completa dei tasti funzione (F1-F12)</li>
                            <li>Tasto Windows e tasti dedicati per i controlli multimediali e la luminosità dello schermo</li>
                            <li>Tastiera retroilluminata</li>
                            <li>Tasto Copilot</li>
                            <li>Touchpad</li>
                        </div>

                        <div class="nome"><h2>Garanzia</h2></div>
                        <div class="caratteristiche">
                            <a>1 anno di garanzia limitata sull'hardware</a>
                        </div>

                        <div class="nome"><h2>Capacità della batteria</h2></div>
                        <div class="caratteristiche">
                            <li>Capacità nominale della batteria (WH) 47</li>
                            <li>Capacità minima della batteria (WH) 46</li>
                        </div>

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