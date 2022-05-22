<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10;url=produtos.php">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inserir Pedido</title>
</head>

<body>

    <div class="container_principal flex-row">
        <?php

        session_start();

        $cod_cliente = $_SESSION['codcliente'];
        $total_pedido = $_POST['total_pedido'];

        include '../banco/conn.php';

        $sql = "INSERT INTO pedidos values (0, $cod_cliente, $total_pedido)";

        if ($conn->query($sql) === TRUE) {
            $ultimo_id_pedido = $conn->insert_id;
            echo "Pedido realizado com Sucesso! O código do pedido é: " . $ultimo_id_pedido;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        foreach ($_POST as $chave => $value) {

            if (preg_match('/^qtd_item/', $chave)) {

                $cod_produto = str_replace('qtd_item-', "", $chave);
                $cod_produtos[$cod_produto] = $value;
            }

            if (preg_match('/^valor_item/', $chave)) {
                $valor_produto = str_replace('valor_item-', "", $chave);
                $valores_total[$valor_produto] = $value;
            }
        }


        foreach ($cod_produtos as $chaveCod => $value) {

            foreach ($valores_total as $chavePreco => $valuePreco) {

                if ($chaveCod === $chavePreco) {
                    $cod_produto = $chaveCod;
                    $quantidade = $value;
                    $valor_total = $valuePreco;
                }
            }

            $query = "INSERT INTO item_produto (cod_produto, cod_pedido, quantidade, total) VALUES ($cod_produto, $ultimo_id_pedido, $quantidade, $valor_total)";
            $insert = mysqli_query($conn, $query);
        }


        $conn->close();


        ?>
    </div>
</body>

</html>