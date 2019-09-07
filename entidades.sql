# CREACION DE TABLAS:

IMPORTANTE PONER ENGINE=InnoDB; al final de la creacion de cada tabla;

# USUARIOS :

create table usuarios(
id int (255) AUTO_INCREMENT not null,
nombre varchar(255) not null, 
apellidos varchar(255), 
email varchar(255) not null, 
password varchar(255) not null,
fecha date not null, 
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE=InnoDb;

# CATEGORIAS:

create table categorias(
id int(255) AUTO_INCREMENT not null, 
nombre varchar(255), 
CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDb;

# ENTRADAS:

create table entradas(
id int(255) AUTO_INCREMENT not null,
usuarios_id int(255) not null,
categorias_id int(255) not null,
titulo varchar(255) not null, 
descripcion varchar(255) not null, 
fecha date not null, 
CONSTRAINT pk_entradas PRIMARY KEY (id),
CONSTRAINT fk_usuarios FOREIGN KEY (usuarios_id) REFERENCES usuarios(id),
CONSTRAINT fk_categorias FOREIGN KEY (categorias_id) REFERENCES categorias(id))
ENGINE=InnoDb;