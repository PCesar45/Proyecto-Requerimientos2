use db;
CREATE TABLE IF NOT EXISTS usuarios (
	id int  NOT NULL AUTO_INCREMENT,
	nombre varchar(255) ,
	apellido  varchar(255) ,
	correo  varchar(255) ,
	usuario varchar(255) ,
	contraseña  varchar(255),
	primary KEY(id)
);

CREATE TABLE IF NOT EXISTS cuentas (
	id int  NOT NULL AUTO_INCREMENT,
    nombre varchar(255) ,
    numero int,
    saldo  float,
    usuario_id int,
	PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS citas (
	id int  NOT NULL AUTO_INCREMENT,
    tipo varchar(255) ,
    sucursal varchar(255) ,
    dia date,
    hora time,
    usuario_id int,
	PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
CREATE TABLE IF NOT EXISTS SalidaDelPais (
	id int  NOT NULL AUTO_INCREMENT,
    nombre varchar(255) ,
    cedula int ,
    tel int,
    correo varchar(255) ,
    paisdestino varchar(255),
    llegada date,
    salida date,
    usuario_id int,
	PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
CREATE TABLE IF NOT EXISTS movTransferencias (
	id int  NOT NULL AUTO_INCREMENT,
    CuentaBene int,
    ced int,
    monto  float,
    detalle varchar(255),
    banco varchar(255),
    cuenta_id int,
    usuario_id int,
	PRIMARY KEY (id),
    FOREIGN KEY (cuenta_id) REFERENCES cuentas(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
INSERT INTO usuarios (nombre,apellido,correo,usuario,contraseña) VALUES('Pablo','Villafuerte','pacviu@gmail.com','pvillafuerte','p123'),('Gabriela','Gutierrez','gaby.gutierrez.va@gmail.com' ,'ggutierrez','g123'),('Pia','Sancho','piasancho1@hotmail.com','psancho','p123');
INSERT INTO cuentas (nombre,numero,saldo,usuario_id) VALUES
                      ('Cuenta principal','111',3200000,1),
                      ('Cuenta Secundaria','112',20000,1),
                      ('Cuenta Gabriela','222',50000,2),
                      ('Cuenta Gabriela 2','223',30000,2),
                      ('Cuenta principal Pia','333',7000000,3),
                      ('Cuenta Secundaria Pia','334',100000,3);
select * from usuarios;
select * from citas;
SELECT * FROM citas  WHERE usuario_id= 3;
select * from salidadelpais;
UPDATE citas SET hora='19:47' WHERE id= 1 and usuario_id=3;
select * from movTransferencias;