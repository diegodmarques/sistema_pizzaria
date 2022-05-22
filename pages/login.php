<?php 
session_start();

$login =$_POST['login'];
$entrar = $_POST['entrar'];
$senha =$_POST['senha'];
$_SESSION['usuario'] = $login;

include '../banco/conn.php';

  if (isset($entrar)) {
           
    $verifica = mysqli_query($conn,"SELECT * FROM cliente WHERE nome = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    $resultado = mysqli_fetch_array($verifica);
    
    
    if (mysqli_num_rows($verifica) <= 0 ){
      echo"<script language='javascript' type='text/javascript'>
      
      alert('Login e/ou senha incorretos');window.location
      .href='../index.html';
      
      </script>";
      die();
    }else{
        $cod_cliente = $resultado['id'];
        $_SESSION['codcliente'] = $cod_cliente;
        header("Location:./produtos.php");
      }
  }

$conn->close();

?>