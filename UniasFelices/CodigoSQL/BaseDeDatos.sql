------------------- Creación de tablas ------------------

CREATE TABLE Jefe(
cedula number(10) primary key,
nombre varchar2(50) not null,
telefono varchar2(10),
direccion varchar2(20) not null
);

CREATE TABLE manicurista(
jefe number(10) references jefe,
cedula number(10) primary key,
nombre varchar2(50) not null,
telefono varchar2(10),
direccion varchar2(20) not null,
nivelEstudio varchar2(10) not null
);

CREATE TABLE carrito(
manicurista number(10) references manicurista,
cod number(4) primary key,
color varchar2(15) not null
);

CREATE TABLE cliente(
cedula number(10) primary key,
nombre varchar2(50) not null,
telefono varchar2(10),
direccion varchar2(20) not null
);

------------------------------------------------------------
--Para Oracle
CREATE TABLE cita(
cliente number(10) references cliente,
fechaHora date primary key,
tipo varchar2(1) not null,
check(tipo='d' or tipo = 'l')
);
CREATE TABLE domicilio(
manicurista references manicurista,
domFecHora DATE references cita,
direccion varchar2(20) not null,
primary key(manicurista,domFecHora)
);
CREATE TABLE spa(
manicurista references manicurista,
spaFecHora DATE references cita,
primary key(manicurista,spaFecHora)
);

--------------------------------------------------------------

CREATE TABLE servicio(
codigo number(3) primary key,
precio number(4) not null,
nombre varchar2(50) not null,
descripcion varchar2(500),
check(precio >= 0)
);

CREATE TABLE servicioXcita(
cita DATE references cita,
service number(3) references servicio,
primary key(cita,service) 
);

CREATE TABLE compra(
consecutivo number(4) primary key,
fecha DATE not null,
comprador number(10) references cliente
);

------------------------------------------------------------------
CREATE TABLE item(
codigo number(4) primary key,
nombre varchar2(40) not null,
precio_compra number(6) not null,
tipo varchar2(1) not null,
check((tipo='p' or tipo = 'h') and (precio_compra >= 0))
);

CREATE TABLE producto(
codprod number(4) primary key references item,
precio_venta number(4) not null,
check( precio_venta >= 0)
);

CREATE TABLE herramienta(
codherr number(4) primary key references item
);

------------------------------------------------------------------

CREATE TABLE productoXcompra(
codigo_producto_compra number(4) primary key,
producto number(4) references producto,
consecutivo number(4) references compra,
cantidad number(3) not null,
check(cantidad >= 0)
);

CREATE TABLE itemXcarrito(
cod_carrito number(4) references carrito,
cod_herramienta number(4) references herramienta,
cantidad number(2) not null,
check(cantidad >= 0),
PRIMARY KEY(cod_carrito,cod_herramienta)
);
