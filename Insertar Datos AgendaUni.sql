DECLARE
OID_JUAN INTEGER;
OID_JOSE INTEGER;
OID_MATILDE INTEGER;
OID_LUISA INTEGER;

OID_CAL1 INTEGER;

OID_EV1 INTEGER;

BEGIN
INSERTAR_USUARIO('Juan','P�rez Mart�n','PAS', 'juan@us.es', 'qwerty');
OID_JUAN := SEC_USUARIOS.CURRVAL;
INSERTAR_USUARIO('Josefa','L�pez Consuegra', 'PDI' , 'josefa@us.es', '123456');
OID_JOSE := SEC_USUARIOS.CURRVAL;
INSERTAR_USUARIO('Matilde','Arjona G�mez', 'ALUMNO', 'matilde@us.es', 'matilde');
OID_MATILDE := SEC_USUARIOS.CURRVAL;
INSERTAR_USUARIO('Luisa','Garc�a Mar�n', 'PDI', 'luisa@us.es', 'qwerty');
OID_LUISA := SEC_USUARIOS.CURRVAL;

SELECT SEC_EVENTOS.CURRVAL INTO OID_EV1 FROM DUAL;
INSERTAR_CALENDARIO('Calendario-1','Esto es una prueba de calendario', 'NOCOMPARTIDO', 'SI', OID_JOSE); 
INSERTAR_EVENTO('Examen de IISSI', NULL, NULL, SYSDATE, NULL, NULL, 'UNICO', 'NO', NULL, OID_JOSE, SEC_CALENDARIOS.CURRVAL, NULL);

COMMIT;

END;
