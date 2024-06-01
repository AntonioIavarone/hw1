<!DOCTYPE html>
<?php

session_start();

if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
    {
        header("Location: index.php");
        exit;
    }

if(isset($_POST['email']) && isset($_POST['psw']) ){

    $conn = mysqli_connect('localhost','root','','homework') or die ("Errore:".mysqli_connect_error());

    $psw = mysqli_real_escape_string($conn,$_POST['psw']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $query = "SELECT id,nome FROM utenti WHERE email = '".$email."' AND password = '".hash('sha256',$psw)."'";
        $res = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($res) > 0)
        {
            $row = $res->fetch_assoc();
            $nome = $row['nome'];
            $id = $row['id'];

            $_SESSION["username"] = $nome;
            $_SESSION["email"]=$_POST['email'];
            $_SESSION["id"] = $id;
            header("Location: index.php");
            exit;
        }
        else
        {
            $ctrl = true;
        }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <script src="login.js" defer></script>
    </head>
    <body>
        <div class="sfondo">
            <div class="mid">
                <div class="form">
                    <image src="immagini/logo.jpeg"></image>
                    <h2>Accedi</h2>
                    <?php
                        if(isset($ctrl)){
                            echo"<a>Credenziali errate</a>";
                        }
                    ?>
                    <form method="post" name="login" >
                        Email:<input type="text" name="email" required><br>
                        Password:<input type="password" name="psw" required>
                        <span>Nessun account?</span>
                        <a href="registrazione.php">Creane uno!</a>
                        <div class="bottone">
                            <input type="submit" class="btn" value="Successivo">
                        </div>
                        <div id="bottone">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>