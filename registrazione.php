<!DOCTYPE html>
<?php

session_start();

if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
    {
        header("Location: index.php");
        exit;
    }

if(isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['nome']) ){

    $conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());

    $username= mysqli_real_escape_string($conn,$_POST['nome']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,hash('sha256',$_POST['psw']));

    $controllo_email = "SELECT * FROM utenti WHERE email = '$email'";

    $result = $conn->query($controllo_email);

    if ($result->num_rows > 0) {
        
        $ctrl=true;
    } else
    {
        $sql = "INSERT INTO utenti (Nome,Email,Password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            $_SESSION["username"] = $username;
            $_SESSION["email"]=$email;
            exit;
        } else {
            
            $ctrl=true;
        }
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <script src="registrazione.js" defer></script>
    </head>
    <body>
        <div class="sfondo">
            <div class="mid" >
                <div class="form">
                    <image src="immagini/logo.jpeg"></image>
                    <h2>Registrati</h2>
                    <form method="post" name="registrazione" >
                        Nome:<input type="text" name="nome" required><br>
                        Email:<input type="text" name="email" required><br>
                        Password:<input type="password" name="psw" required>
                        Conferma password:<input type="password" name="cpsw" required>
                        <div class="bottone" >
                            <input type="submit" class="btn" value="Successivo">
                        </div>
                        <span>Hai già un account?</span>
                        <a href="login.php">Esegui il login da qui!</a>
                        <div id="bottone">
                        </div>
                    </form>
                    <?php
                        if(isset($ctrl)){
                            echo"<a>Email già utilizzata</a>";
                            $ctrl=null;
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>



