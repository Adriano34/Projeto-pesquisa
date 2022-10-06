create table municipios (
	id int not null primary key auto_increment,
	ibge varchar (10),
	municipio varchar (255) not null,
	uf varchar(2) not null
);