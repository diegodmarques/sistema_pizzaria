<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pedidos</title>
</head>

<body>

    <div class="container_principal">
        <?php include "./header.php"; ?>

        <?php


        $usuario = $_SESSION['usuario'];

        foreach ($_REQUEST as $chave => $value) {
            if ($value == 0) {
                unset($_REQUEST[$chave]);
            }
        }

        $query = sprintf(" SELECT * FROM produtos WHERE id in (%s)", implode(',', array_keys($_REQUEST)));

        include "../banco/conn.php";

        $resultados = mysqli_query($conn, $query) or die(mysqli_error($conn));

        ?>

        <form action="./inserirPedido.php" method='POST'>
            <div class="container_pedido">
                <div class="card_3">
                    <div class="item_valor">
                        <div name="nome"><?= 'Nome: ' . '' . ucfirst($usuario) ?></div>
                        <div><?php echo 'Cod_Cliente: ' ?></div>
                    </div>

                    <div class='botao_span'>
                        <div><?= $_SESSION['codcliente'] ?></div>
                    </div>
                </div>
                <?php

                $total = [];



                while ($resultado = mysqli_fetch_array($resultados)) {

                ?>
                    <div class='card_3' id="<?php echo $resultado['id']  ?>">
                        <div class="item_valor">
                            <div><?php foreach ($_REQUEST as $chave => $value) {

                                        if ($chave == $resultado['id']) {
                                            echo 'Qtd. ' . $value;
                                    ?>
                                        <input type="hidden" name="qtd_item-<?php echo $resultado['id'] ?>" value="<?php echo $value ?>">
                                <?php
                                        }
                                    } ?>
                            </div>
                            <div><?php echo $resultado['nome'] ?></div>
                        </div>
                        <div class='botao_span'>
                            <div> R$ <?php foreach ($_REQUEST as $chave => $value) {

                                            if ($chave == $resultado['id']) {
                                                echo $resultado['valor'] = number_format($resultado['valor'] * $value, 2, '.');
                                                $valorConvertido = $resultado['valor'];
                                                array_push($total, $valorConvertido);
                                        ?>
                                        <input type="hidden" name="valor_item-<?php echo $resultado['id'] ?>" value="<?php echo floatval($resultado['valor']) ?>">
                                <?php
                                            }
                                        } ?>
                            </div>
                        </div>
                    </div>

                <?php

                }

                ?>

                <div class="card_2">
                    <div class="item_valor">
                        <input class="confirmarpedido" type="submit" value="Confirmar Pedido">
                        <div><?php echo 'Valor Total:' ?></div>
                    </div>

                    <div class="botao_span">
                        <div>R$ <?php $total = number_format(array_sum($total), 2, '.');
                                echo $total ?></div>
                        <input type="hidden" name="total_pedido" value="<?php echo floatval($total) ?>">
                    </div>
                </div>
            </div>
        </form>
        <div></div>
        <div></div>

        <?php

        $conn->close();

        ?>


    </div>
</body>

</html>