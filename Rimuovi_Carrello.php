<?php
session_start();
$id_carrello=$_GET['id'];

echo $id_carrello;

$conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());

$sql = "SELECT * FROM carrello WHERE ID_carrello='$id_carrello'";
$res = mysqli_query($conn, $sql);

if ($res->num_rows > 0) {
    $sql2 = "DELETE FROM carrello WHERE ID_carrello='$id_carrello'";
    $res2 = mysqli_query($conn, $sql2);
    header('Location: carrello.php');
}else {
    echo "Prodotto non trovato!";
}
?>