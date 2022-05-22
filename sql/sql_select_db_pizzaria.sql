USE db_pizzaria;

select * from cliente;
DESCRIBE cliente;
select * from item_produto;
DESCRIBE item_produto;
select * from produtos;
DESCRIBE produtos;
select * from pedidos;
DESCRIBE pedidos;

SELECT cliente.nome, produtos.nome, item_produto.quantidade, item_produto.total 
FROM cliente INNER JOIN pedidos ON pedidos.cod_cliente = cliente.id
INNER JOIN item_produto ON item_produto.cod_pedido = pedidos.id
INNER JOIN produtos ON item_produto.cod_produto = produtos.id WHERE cliente.id = 4;

SELECT pedidos.id, cliente.nome, sum(item_produto.quantidade) AS quantidade, sum(item_produto.total) AS total
FROM cliente INNER JOIN pedidos ON pedidos.cod_cliente = cliente.id
INNER JOIN item_produto ON item_produto.cod_pedido = pedidos.id
INNER JOIN produtos ON item_produto.cod_produto = produtos.id WHERE cliente.id = 4 GROUP BY pedidos.id;