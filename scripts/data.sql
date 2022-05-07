create table livros (
	livro_id int primary key auto_increment,
    titulo varchar(50) not null,
    autor_id int,
    classificacao varchar(50),
    editora varchar(50),
    edicao int,
    paginas int
);

create table leitores (
	leitor_id int primary key auto_increment,
    primeiro_nome varchar(50) not null,
    sobrenome varchar(50),
    dataNasc date,
    cidade varchar(50),
    estado varchar(2),
    pais varchar(20)
);

create table autores (
	autor_id int primary key auto_increment,
    primeiro_nome varchar(50) not null,
    sobrenome varchar(50),
    dataNasc date,
    cidade varchar(50),
    pais varchar(20)
);

create table biblioteca (
	biblioteca_id int primary key auto_increment,
	leitor_id int,
    nome varchar(50)
);

create table biblioteca_livro(
	biblioteca_id int,
    livro_id int,
    primary key (biblioteca_id, livro_id)
);

create table leitura(
	leitor_id int not null,
    livro_id int not null,
    dataInicio date,
    dataFim date,
    nota double,
    comentario varchar(250),   
    primary key (leitor_id, livro_id)
);

create table amizade(
	amigo_id1 int,
    amigo_id2 int,
    primary key (amigo_id1, amigo_id2)
);

ALTER TABLE livros ADD CONSTRAINT autor_id FOREIGN KEY (autor_id) REFERENCES autores(autor_id);

ALTER TABLE biblioteca ADD CONSTRAINT leitor_id FOREIGN KEY (leitor_id) REFERENCES leitores(leitor_id);

ALTER TABLE biblioteca_livro ADD CONSTRAINT livro_id FOREIGN KEY (livro_id) REFERENCES livros(livro_id);

ALTER TABLE biblioteca_livro ADD CONSTRAINT biblioteca_id FOREIGN KEY (biblioteca_id) REFERENCES biblioteca(biblioteca_id);

ALTER TABLE leitura ADD CONSTRAINT leitor_leitura_id FOREIGN KEY (leitor_id) REFERENCES leitores(leitor_id);

ALTER TABLE leitura ADD CONSTRAINT livro_leitura_id FOREIGN KEY (livro_id) REFERENCES livros(livro_id);

ALTER TABLE amizade ADD CONSTRAINT amigo_id1 FOREIGN KEY (amigo_id1) REFERENCES leitores(leitor_id);

ALTER TABLE amizade ADD CONSTRAINT amigo_id2 FOREIGN KEY (amigo_id2) REFERENCES leitores(leitor_id);

insert into autores (
	primeiro_nome,
    sobrenome,
    dataNasc,
    cidade,
    pais
) values ('J.R.R','Tolkien',STR_TO_DATE( '12/06/1962', '%d/%m/%Y'),'Londres','England'),
		('J.R.R','Martin',STR_TO_DATE( '12/06/1912', '%d/%m/%Y'),'New York','USA'),
        ('Jordan','Peterson',STR_TO_DATE( '10/02/1952', '%d/%m/%Y'),'Miami','USA'),
        ('Mario','Cortella',STR_TO_DATE( '30/01/1965', '%d/%m/%Y'),'São Paulo','Brasil');

insert into livros (
	titulo,
    autor_id,
    classificacao,
    editora,
    edicao,
    paginas
) values ('O Hobbit',1,'Aventura','Abril',4,450),
		('O Senhor dos Aneis - A sociedade do anel',1,'Aventura','Abril',2,400),
        ('O Senhor dos Aneis - As dua torres',1,'Aventura','Abril',2,420),
        ('O Senhor dos Aneis - O Retorno do Rei',1,'Aventura','Abril',1,350),
        ('12 regras para a vida',3,'Desenvolvimento pessoal','Globo',1,220),
        ('O cavaleiro dos sete reinos',2,'Fantasia','Leitura',3,650),
        ('O poder do Hábito',4,'Desenvolvimento Pessoal','Abril',2,150);

insert into leitores (
	primeiro_nome,
    sobrenome,
    dataNasc,
    cidade,
    estado,
    pais
) values ('Mateus','Rossi',STR_TO_DATE( '27/12/1988', '%d/%m/%Y'),'Caxias do Sul','RS', 'Brasil'),
		('Bruna','Camargo',STR_TO_DATE( '29/05/1991', '%d/%m/%Y'),'Flores da Cunha','RS', 'Brasil'),
        ('Dhiego','De Gasperi',STR_TO_DATE( '28/12/1990', '%d/%m/%Y'),'Rio de Janeiro','RJ', 'Brasil'),
        ('Guto','Moreira',STR_TO_DATE( '09/05/1987', '%d/%m/%Y'),'Canoas','RS','Brasil');

insert into biblioteca (
	leitor_id,
    nome
) values 	(1, 'Favoritos'),
			(1, 'Aventura'),
            (3, 'Desenvolvimento'),
            (2, 'Favoritos');

insert into biblioteca_livro (
	biblioteca_id,
    livro_id
) values 	(1, 1),(1, 2),(1, 3),(2, 1),(2, 2),(3, 5),(3, 7),(4, 4),(4, 5),(4, 3);

insert into amizade (
	amigo_id1,
    amigo_id2
) values 	(1, 2),(1, 3),(1, 4),(2, 4),(2, 3),(3, 4);

insert into leitura(
	leitor_id,
    livro_id,
    dataInicio,
    dataFim,
    nota,
    comentario
) values (1,1,STR_TO_DATE('20/01/2021', '%d/%m/%Y'),STR_TO_DATE( '12/03/2021', '%d/%m/%Y'),5, 'Muito bom'),
		(1,6,STR_TO_DATE('25/06/2021', '%d/%m/%Y'),STR_TO_DATE( '12/08/2021', '%d/%m/%Y'),1, 'Cansativo'),
        (3,2,STR_TO_DATE( '20/04/2020', '%d/%m/%Y'),STR_TO_DATE( '01/07/2020', '%d/%m/%Y'),4, 'Ótimo'),
        (4,5,STR_TO_DATE( '20/01/2019', '%d/%m/%Y'),STR_TO_DATE( '30/04/2019', '%d/%m/%Y'),5, 'Meu autor favorito');
        



