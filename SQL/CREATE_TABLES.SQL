CREATE TABLE Persona(
	identificacion INT NOT NULL PRIMARY KEY, 
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(50) NOT NULL,
	correo VARCHAR(50) NOT NULL UNIQUE,
)

CREATE TABLE Usuario(
	identificacion INT NOT NULL,
	usuario VARCHAR(50) NOT NULL PRIMARY KEY,
	contraseña VARCHAR(50) NOT NULL,

	FOREIGN KEY (identificacion) REFERENCES Persona(identificacion),
)
CREATE TABLE Log_sesion(
	consecutivo INT IDENTITY (1,1),
	usuario VARCHAR(50) NOT NULL,
	nombre_sesion VARCHAR(50) NOT NULL,
	fecha DATETIME NOT NULL,
)
CREATE TABLE Log_database(
	consecutivo INT IDENTITY (1,1),
	nombre_tabla VARCHAR(50),
	accion VARCHAR(50),
	descripcion VARCHAR(50),
	fecha DATETIME NOT NULL
)
