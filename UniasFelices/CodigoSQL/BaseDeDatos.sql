------------------- Creación de tablas ------------------

CREATE TABLE Jefe(
cedula number(10) primary key,
nombre varchar2(15) not null,
telefono varchar2(10),
direccion varchar2(20) not null
);

CREATE TABLE manicurista(
jefe number(10) references jefe,
cedula number(10) primary key,
nombre varchar2(15) not null,
telefono varchar2(10),
direccion varchar2(20) not null,
nivelEstudio varchar2(10) not null
);

CREATE TABLE carrito(
manicurista number(10) references manicurista,
codigo number(4) primary key,

);