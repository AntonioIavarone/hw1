<?php

    $id = $_GET['id'];

    $conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());
    
    $sql = "SELECT ID_carrello,ID_prodotto,immagine,prodotti.prezzo,prodotti.nome,prodotti.link FROM carrello JOIN prodotti ON carrello.ID_prodotto=prodotti.ID WHERE carrello.ID_Utente='$id'";
    
    $res = mysqli_query($conn, $sql);
    
    if ($res->num_rows > 0) {
        
        $prodotti = array();
    
        while ($row = $res->fetch_assoc()) {
            $immagine_base64 = base64_encode($row['immagine']);
            unset($row['immagine']);
    
            $row['immagine_base64'] = $immagine_base64;
    
            $prodotti[] = $row;
        }
    
        header('Content-Type: application/json');
        echo json_encode($prodotti);
    } else {
        echo "Nessun prodotto trovato.";
    }
?>