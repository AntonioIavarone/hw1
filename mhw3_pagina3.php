<!DOCTYPE html>
    <?php
    session_start();
    ?>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="mhw3_pagina3.css">
        <script src="mhw3_pagina3.js" defer></script>
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
                    <div class="logo" href="immagini/logo.jpeg">
                        <image src="immagini/logo.jpeg"></image>
                    </div>
                    <div class="testa">
                        <a href="index.php">Home</a>
                        <a href="mhw3_pagina2.php">Surface</a>
                        <a href="mhw3_pagina3.php">Xbox</a>
                        <a>Accessori</a>
                    </div>
                    <div class="icone">
                        <a>Tutti i siti Microsoft</a>
                        <a id='cerca' href="#">Cerca</a>
                        <span class="material-symbols-outlined">search</span>
                        <a href='carrello.php'>Carrello</a>
                        <span class="material-symbols-outlined">shopping_cart</span>
                        <?php
                            if(isset($_SESSION["username"]) &&isset($_SESSION["email"]))
                            {
                                echo $_SESSION["username"];
                                echo '<a href="logout.php">Logout</a>';
                            }else{
                                echo "<a href='login.php'>Login</a>";
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
            <div class="text">
                <div class="testo">
                    <h1>Perché acquistare da Microsoft Store</h1>
                    <p>Offriamo spedizioni e resi gratuiti, cashback per i dispositivi usati idonei e opzioni di pagamento flessibili. Inoltre, se abbassiamo il prezzo di un prodotto fisico entro 60 giorni dalla consegna, garantiamo un adeguamento del prezzo una tantum.</p>
                </div>
                
            </div>
            <div class="img">
                <image class='image' src="immagini/Surface-Pro-9-Keyboard-Xbox-Series-S-Headphones-2.avif"></image>
            </div>
        </div>

        <div class="elenco">
            <h1>Console Xbox: Serie X, Serie S e molto altro</h1>
            <div class="prodotti" id='lista'>
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