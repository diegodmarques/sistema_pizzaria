<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class='container_principal'>
        <?php include "./header.php" ?>
        <?php

        $usuario = $_SESSION['usuario'];

        include "../banco/conn.php";

        //criando a query de consulta à tabela criada
        $resultados = mysqli_query($conn, "SELECT * FROM produtos") or die(mysqli_error($conn) //caso haja um erro na consulta
        );
        ?>

        <div class="flex-row">
            <div class='bemvindo relative'>
                <center>Bem-Vindo <b><?= ucfirst($usuario) ?></b>!<br><span class="seuPedido">Faça seu Pedido.</span></center>
            </div>

            <form action="./pedidos.php" method='POST'>
                <div class="container_items">

                    <?php

                    while ($resultado = mysqli_fetch_array($resultados)) {

                    ?>

                        <div class='card' id="<?php echo $resultado['id'] ?>">

                            <img class="imagemProduto" src="../images/<?php echo $resultado['imagem'] ?>">
                            <div class="item_valor">
                                <div><?php echo $resultado['nome'] ?></div>
                                <div> R$ <?php echo $resultado['valor'] ?></div>
                            </div>

                            <div class='botao_span'>
                                <input type="button" value="-" onclick="menos(event)">
                                <input id="quantidade" class='quantidade' value='0' name='<?php echo $resultado['id'] ?>' readonly>
                                <input type="button" value="+" onclick="mais(event)">
                                <input type="hidden" value='<?php echo $resultado['id'] ?>'>
                            </div>

                        </div>

                    <?php

                    }

                    $conn->close();
                    ?>

                    <input id='botao' class="fazerpedido" type="submit" value="Solicitar Pedido" disabled>

                </div>
            </form>
        </div>
        <div></div>

        <script src="../js/script.js"></script>
    </div>
</body>

</html>