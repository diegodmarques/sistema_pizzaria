<?php 
 
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

include '../banco/conn.php';

$sql = mysqli_query($conn, "SELECT * FROM cliente WHERE nome = '$nome'") or die(
	mysqli_error($conn) //caso haja um erro na consulta
);

$array = mysqli_fetch_assoc($sql);
$logarray = $array['nome'];

    if($nome == "" || $nome == null || $senha == "" || $senha == null){

        echo"<script language='javascript' type='text/javascript'>

        alert('Todos os campos devem ser preenchidos');
        window.location.href='cadastro.html';

        </script>";
    
    }else{
        if($logarray == $nome){
 
            echo"<script language='javascript' type='text/javascript'>

            alert('Esse login já existe');
            window.location.href='cadastro.html';

            </script>";

        }else{

            $telefone = '('. substr($telefone, 0,2) .') '. substr($telefone, 2,5).'-'.substr($telefone, 7,4);
            $query = "INSERT INTO cliente VALUES (0,'$nome','$telefone', '$endereco', '$senha')";
            $insert = mysqli_query($conn, $query);
            
            if($insert){
                echo"<script language='javascript' type='text/javascript'>

                alert('Usuário cadastrado com sucesso!');
                window.location.href='../index.html'
                
                </script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>

                alert('Não foi possível cadastrar esse usuário');
                window.location.href='cadastro.html'
                
                </script>";
            }
        }
    }

$conn->close();
?>