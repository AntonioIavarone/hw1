<?php
$conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());

$requestData = json_decode(file_get_contents('php://input'), true);
$searchTerm = $requestData['searchTerm'];

$sql = "SELECT id,link, nome, prezzo, descrizione, immagine FROM prodotti WHERE nome LIKE '%$searchTerm%'";

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