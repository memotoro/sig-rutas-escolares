<?php 
/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
require_once ("conexion_DAO.php");

conectar_bd();
$sql="delete from posicion";
$postgres_resultado=pg_Exec($sql) or die ("NO SE PUDO ELIMINAR LAS COORDENADAS DE LA BASE DE DATOS"); 
$sql="select setval('posicion_gid_seq',1)";
$postgres_resultado=pg_Exec($sql) or die ("NO SE PUDO ACTUALIZAR LA SECUENCIA"); 
pg_close();
echo "<script>alert('LAS POSICIONES HAN SIDO BORRADAS DE LA BASE DE DATOS')</script>";
echo "<script>window.location='gps.php'</script>";

/* 
CREATE TABLE posicion
(
  gid serial NOT NULL,
  latitud numeric,
  longitud numeric,
  fecha timestamp without time zone,
  serial_gps character varying(10),
  id_vehiculo integer,
  the_geom geometry,
  CONSTRAINT posicion_pkey PRIMARY KEY (gid),
  CONSTRAINT posicion_vehiculo_fk FOREIGN KEY (id_vehiculo)
      REFERENCES vehiculo (id_vehiculo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT enforce_dims_the_geom CHECK (ndims(the_geom) = 2),
  CONSTRAINT enforce_geotype_the_geom CHECK (geometrytype(the_geom) = 'POINT'::text OR the_geom IS NULL),
  CONSTRAINT enforce_srid_the_geom CHECK (srid(the_geom) = 4326)
) 
WITHOUT OIDS;
ALTER TABLE posicion OWNER TO usuario_consulta;
*/

?>