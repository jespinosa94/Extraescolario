DELIMITER //
CREATE PROCEDURE inscribir_buscador(in p_buscador int, in p_actividad int, in p_turno int)
BEGIN
	INSERT INTO SE_INSCRIBE VALUES (p_buscador, p_actividad, "0-0-0", "0-0-0", 1);
	INSERT INTO SE_INSCRIBE_TURNO VALUES (p_actividad, p_buscador, p_turno);
END; //
