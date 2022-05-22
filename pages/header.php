<?php


session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../index.html");
}

?>

<div class='container_pai'>
    <div class="container_header">
        <img class="imagemLogo" src="../images/logo.png" alt="">
        <div class="loginLogoff">
            <div class="text-right">
                <p><?= ucfirst($_SESSION['usuario']); ?></p>
                <span><a href="./logout.php">Logout</a></span>
            </div>
            <img class="imagemPerfil" src="../images/logoperfil.png" alt="">
        </div>
    </div>
</div>