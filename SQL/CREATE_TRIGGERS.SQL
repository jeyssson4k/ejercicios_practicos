CREATE TRIGGER tri_log_usuario
   ON  Usuario 
   AFTER INSERT,DELETE,UPDATE
AS 
BEGIN
	DECLARE @nombre_evento varchar(15)
	DECLARE @nombre_tabla varchar(10) = 'Usuario'
	DECLARE @fecha datetime = GETDATE()
	DECLARE @descripcion_evento varchar(150)
	IF EXISTS(SELECT * FROM inserted)
		IF EXISTS(SELECT * FROM deleted)
			SELECT @nombre_evento = 'UPDATE', @descripcion_evento = 'Se modificó un registro.'
		ELSE
			SELECT @nombre_evento = 'INSERT', @descripcion_evento = 'Se insertó un nuevo registro.'
		ELSE
			IF EXISTS(SELECT * FROM deleted)
				SELECT @nombre_evento = 'DELETE', @descripcion_evento = 'Se eliminó un registro.'
		ELSE
			SELECT @nombre_evento = 'NONE', @descripcion_evento = 'Evento incompleto.'

	INSERT INTO Log_database 
	VALUES(
	@nombre_tabla,
	@nombre_evento, 
	@descripcion_evento, 
	@fecha)
END
GO

CREATE TRIGGER tri_log_persona
   ON  Persona 
   AFTER INSERT,DELETE,UPDATE
AS 
BEGIN
	DECLARE @nombre_evento varchar(15)
	DECLARE @nombre_tabla varchar(10) = 'Persona'
	DECLARE @fecha datetime = GETDATE()
	DECLARE @descripcion_evento varchar(150)
	IF EXISTS(SELECT * FROM inserted)
		IF EXISTS(SELECT * FROM deleted)
			SELECT @nombre_evento = 'UPDATE', @descripcion_evento = 'Se modificó un registro.'
		ELSE
			SELECT @nombre_evento = 'INSERT', @descripcion_evento = 'Se insertó un nuevo registro.'
		ELSE
			IF EXISTS(SELECT * FROM deleted)
				SELECT @nombre_evento = 'DELETE', @descripcion_evento = 'Se eliminó un registro.'
		ELSE
			SELECT @nombre_evento = 'NONE', @descripcion_evento = 'Evento incompleto.'

	INSERT INTO Log_database 
	VALUES(
	@nombre_tabla,
	@nombre_evento, 
	@descripcion_evento, 
	@fecha)
END
GO
