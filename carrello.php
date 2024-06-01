<!DOCTYPE html>
    <?php
    session_start();
    $id_utente = isset($_SESSION["id"]) ? $_SESSION["id"] : null;
    $totale = isset($_SESSION["totale"]) ? $_SESSION["totale"] : null;
   
    ?>
<html>

    <div id="datiNascosti" class='nascosto'>
        <span id="idUtente"><?php echo $id_utente; ?></span>
    </div>

    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="carrello.css">
        <script src="VediCarrello.js" defer></script>
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
                        <?php
                            if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
                            {
                                echo $_SESSION["username"];
                                echo '<a href="logout.php">Logout</a>';
                            }else{
                                echo "<a href='login.php'>Login</a>";
                                echo "<span class='material-symbols-outlined'>login</span>";
                            }
                        ?>
                    </div>
                    
                </nav>
            </div>
        </header>

        <div class='container2'>
            <div class='carrello'>
                <div class='prodotto' id='prodotto'>
                </div>
                <div class='totale'>
                    <h2>Riepilogo ordine</h2>
                    <span class='info' id='articoli'>
                        <span>Articoli:</span>
                    </span>
                    <span class='info'>
                        <span>Spedizione:</span>
                        <span>Gratis</span>
                    </span>
                    <span class='info' id='totale'>
                        <span>Totale:</span>
                    </span>
                    <button id='Transazione' type="submit" class='btn'>Completa Transazione</button>
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

<?php

if (isset($_GET['code']) && $_SESSION['totale'] > 0) {
    $amount= $_SESSION['totale'];
    $authorizationCode = $_GET['code'];
    

    function generateIdempotencyKey() {
        return bin2hex(random_bytes(16)); 
    }

    $idempotencyKey = generateIdempotencyKey();
    
    $clientId = '';
    $clientSecret = '';
    $redirectUri = 'http://localhost/homeworkv2/carrello.php';
    
    $url = 'https://connect.squareupsandbox.com/oauth2/token';

    $data = [ 
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'code' => $authorizationCode,
        'grant_type' => 'authorization_code',
        'redirect_uri' => $redirectUri,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
    
    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);

    if (isset($responseData['access_token'])) {
       
        $accessToken = $responseData['access_token'];
        
        $url = 'https://connect.squareupsandbox.com/v2/payments';

        $data = [
            'source_id' => 'cnon:card-nonce-ok', 
            'idempotency_key' => $idempotencyKey, 
            'amount_money' => [
                'amount' => (int)$amount*100, 
                'currency' => 'USD'
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if ($response === false) {
            echo 'Errore cURL: ' . curl_error($ch);
        } else {
            $responseData = json_decode($response, true);
           
            $conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());

            $sql = "SELECT * FROM carrello WHERE ID_utente='$id_utente'";
            $res = mysqli_query($conn, $sql);

            if ($res->num_rows > 0) {
                $sql2 = "DELETE FROM carrello WHERE ID_utente='$id_utente'";
                $res2 = mysqli_query($conn, $sql2);
            }else {
                echo "Prodotto non trovato!";
            }
        }
    curl_close($ch);
    }
} 

?>

</html>
