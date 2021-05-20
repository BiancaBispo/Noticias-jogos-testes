CREATE DATABASE vendas;
USE vendas;

CREATE TABLE IF NOT EXISTS `tabela_produtos` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`nome_produto` varchar(255) NOT NULL, 
`preco_produto` decimal (20) NOT NULL,
`estoque_produtos` int(10) NOT NULL,
`imagem_produto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

select*from tabela_produtos;

INSERT INTO tabela_prdutos (usuario,senha) VALUES
('bianca','123456');

truncate table tabela_login;