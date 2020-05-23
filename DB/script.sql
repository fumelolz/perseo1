CREATE DATABASE IF NOT EXISTS perseov1;
USE perseov1;

CREATE TABLE IF NOT EXISTS personas(
	id_persona int PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(45) not null,
	ap_Paterno varchar(45) not null,
	ap_Materno varchar(45) not null,
	email varchar(40),
	rfc varchar(13),
	ine varchar(45),
	direccion varchar(55),
	pais varchar(45),
	estado varchar(45),
	ciudad varchar(45),
	fecha_nacimiento date
);

CREATE TABLE IF NOT EXISTS telefonos_personas(
	id_telefono int,
	id_persona int,
	telefono varchar(45),
	descripcion varchar(45),
	CONSTRAINT pk_telefonos_personas PRIMARY KEY(id_telefono,id_persona),
	CONSTRAINT fk_id_persona_personas_telefonos_personas FOREIGN KEY(id_persona) references personas(id_persona)
);

CREATE TABLE IF NOT EXISTS clientes(
	id_cliente int AUTO_INCREMENT,
	id_persona int,
	CONSTRAINT pk_clientes PRIMARY KEY(id_cliente,id_persona),
	CONSTRAINT fk_id_persona_personas_clientes FOREIGN KEY(id_persona) references personas(id_persona)
);

#Crea la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios(
	id_usuario int AUTO_INCREMENT,
	id_persona int,
	username varchar(45) NOT NULL,
	password varchar(45) NOT NULL,
	estado tinyint(1) DEFAULT 0,
	fecha_alta date,
	fecha_baja date,
	nivel tinyint(3) DEFAULT 1,
	ultimo_login datetime,
	CONSTRAINT pk_usuarios PRIMARY KEY(id_usuario,id_persona),
	CONSTRAINT fk_id_persona_personas_usuarios FOREIGN KEY(id_persona) references personas(id_persona)
);

CREATE TABLE IF NOT EXISTS categorias_productos(
	id_categoria int PRIMARY KEY AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL
);


CREATE TABLE IF NOT EXISTS productos(
	id_producto int PRIMARY KEY AUTO_INCREMENT,
	descripcion varchar(45),
	precio_compra decimal(10,2),
	precio_venta decimal(10,2),
	ruta_imagen varchar(45),
	estado tinyint(1),
	categoria int,
	CONSTRAINT fk_id_categoria_categorias FOREIGN KEY(categoria) references categorias_productos(id_categoria)
);

CREATE TABLE IF NOT EXISTS venta(
	id_venta int PRIMARY KEY AUTO_INCREMENT,
	id_usuario int NOT NULL,
	id_cliente int,
	fecha date NOT NULL,
	iva int NOT NULL, 
	subtotal decimal(10,2) NOT NULL,
	total decimal(10,2) NOT NULL,
	CONSTRAINT fk_id_usuario_usuarios FOREIGN KEY(id_usuario) references usuarios(id_usuario),
	CONSTRAINT fk_id_cliente_clientes FOREIGN KEY(id_cliente) references clientes(id_cliente)
);

CREATE TABLE IF NOT EXISTS detalle_venta(
	id_venta int,
	id_producto int,
	cantidad int NOT NULL,
	CONSTRAINT pk_detalle_venta PRIMARY KEY(id_venta,id_producto),
	CONSTRAINT fk_id_venta_venta FOREIGN KEY(id_venta) references venta(id_venta),
	CONSTRAINT fk_id_producto_productos FOREIGN KEY(id_producto) references productos(id_producto)
);

CREATE TABLE IF NOT EXISTS proveedores(
	id_proveedor int PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(45),
	fecha_alianza date,
	estado tinyint(1),
	ultima_fecha_compra date
);

CREATE TABLE IF NOT EXISTS telefonos_proveedores(
	id_telefono int AUTO_INCREMENT,
	id_proveedor int,
	telefono varchar(45),
	descripcion varchar(45),
	CONSTRAINT pk_telefonos_proveedores PRIMARY KEY(id_telefono,id_proveedor),
	CONSTRAINT fk_id_proveedor_proveedores FOREIGN KEY(id_proveedor) references proveedores(id_proveedor)
);

CREATE TABLE IF NOT EXISTS pedido_proveedor(
	id_pedido int PRIMARY KEY AUTO_INCREMENT,
	id_proveedor int,
	id_usuario int,
	fecha date NOT NULL,
	CONSTRAINT fk_id_proveedor_proveedores_pedido FOREIGN KEY(id_proveedor) references proveedores(id_proveedor),
	CONSTRAINT fk_id_usuarios_usuarios_pedido FOREIGN KEY(id_usuario) references usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS detalle_pedido(
	id_pedido int,
	id_producto int,
	cantidad int NOT NULL,
	CONSTRAINT pk_detalle_pedido PRIMARY KEY(id_pedido,id_producto),
	CONSTRAINT fk_id_producto_productos_detalle_pedido FOREIGN KEY(id_producto) references productos(id_producto),
	CONSTRAINT fk_id_pedido_pedido_detalle_pedidos FOREIGN KEY(id_pedido) references pedido_proveedor(id_pedido)
);

CREATE TABLE IF NOT EXISTS transferencia_producto(
	id_transferencia int PRIMARY KEY AUTO_INCREMENT,
	fecha datetime NOT NULL,
	clasificacion tinyint(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS detalle_transferencia_producto(
	id_transferencia int,
	id_producto int,
	cantidad int NOT NULL,
	CONSTRAINT pk_d_trans_prod PRIMARY KEY(id_transferencia,id_producto),
	CONSTRAINT fk_id_transferencia_transferencia_detalle FOREIGN KEY(id_transferencia) references transferencia_producto(id_transferencia), 
	CONSTRAINT fk_id_producto_productos_trans_detalle FOREIGN KEY(id_producto) references productos(id_producto)
);

