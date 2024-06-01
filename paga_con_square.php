<?php
session_start();
$_SESSION['totale']=$_GET['amount'];

$clientId = '';
$redirectUri = 'http://localhost/homeworkv2/carrello.php';
$scope = 'PAYMENTS_WRITE';

$authorizationUrl = "https://connect.squareupsandbox.com/oauth2/authorize?client_id={$clientId}&response_type=code&scope={$scope}&redirect_uri={$redirectUri}";

header('Location: ' . $authorizationUrl);

exit;
?>
