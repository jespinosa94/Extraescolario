DELIMITER //
CREATE PROCEDURE inscribirBuscador(in p_buscador int, in p_actividad int, in p_turno int)
BEGIN
	INSERT INTO SE_INSCRIBE VALUES (p_buscador, p_actividad, "0-0-0", "0-0-0", 1);
	INSERT INTO SE_INSCRIBE_TURNO VALUES (p_actividad, p_buscador, p_turno);
END; //

DELIMITER ||
CREATE FUNCTION comprobarBuscadorInscrito(p_buscador int(11), p_actividad int(11)) RETURNS TINYINT(1)
BEGIN
DECLARE resultado TINYINT;
SET resultado:=0;
SELECT EXISTS (SELECT activa FROM SE_INSCRIBE WHERE rBus=p_buscador AND rActividad=p_actividad AND activa=1) INTO resultado;
RETURN resultado;
END; ||

DELIMITER //
CREATE PROCEDURE anularInscripcionBuscador(in p_buscador int, in p_actividad int)
BEGIN
    UPDATE SE_INSCRIBE SET activa=0 WHERE rBus=p_buscador AND rActividad=p_actividad;
END; //

DELIMITER //
CREATE PROCEDURE anyadirComentario(in p_actividad int, in p_buscador int, in valoracion float, in titulo VARCHAR(50), in descripcion TEXT)
BEGIN
	INSERT INTO VALORACION VALUES (p_actividad, p_buscador, valoracion, titulo, "0-0-0", descripcion);
END; //
