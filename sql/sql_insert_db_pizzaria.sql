USE db_pizzaria;

INSERT INTO cliente VALUES(0, 'Felipe', '(11) 98759-4345', 'R. dos Inocentes, 345', '123456');
INSERT INTO cliente VALUES(0, 'Diego', '(11) 97584-5334', 'R. dos Inocentes, 242', '123456');
INSERT INTO cliente VALUES(0, 'Vitor', '(11) 99223-5257', 'R. dos Alfineiros, 42B', '123456');

INSERT INTO produtos VALUES(0, 'Pizza de Calabresa',  30.35, 'calabresa.png');
INSERT INTO produtos VALUES(0, 'Pizza de Mussaralela',  28.45, 'mussarela.png');
INSERT INTO produtos VALUES(0, 'Pizza de 4 queijos',  33.50, 'quatroqueijos.png');
INSERT INTO produtos VALUES(0, 'Refri Coca-Cola 2L',  12.00 , 'cocacola.png');
INSERT INTO produtos VALUES(0, 'Refri Guaraná 2L',  11.00, 'guarana.png');

INSERT INTO pedidos VALUES (0, 1, 100.5);
INSERT INTO pedidos VALUES (0, 2, 11.00);
INSERT INTO pedidos VALUES (0, 3, 60.70);

INSERT INTO item_produto VALUES (0, 3, 1, 2, 67.00);
INSERT INTO item_produto VALUES (0, 3, 1, 1, 33.50);
INSERT INTO item_produto VALUES (0, 5, 2, 1, 11.00);
INSERT INTO item_produto VALUES (0, 1, 3, 2, 60.70);


