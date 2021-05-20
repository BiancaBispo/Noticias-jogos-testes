create database produtos;

create table curso (
id int not null,
nome varchar(50) not null
);

insert into curso(id,nome) 
values (1, 'Curso de HTML5, CSS3 e Bootstrap'),
(2, 'Curso de PHP, MySQL e Bootstao'),
(3, 'Curso de Oratoria'),
(4, 'Curso de Marketing Pessoal');

select*from curso;

