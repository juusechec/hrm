-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- pgModeler  version: 0.9.1-beta
-- PostgreSQL version: 10.0
-- Project Site: pgmodeler.com.br
-- Model Author: ---


-- Database creation must be done outside an multicommand file.
-- These commands were put in this file only for convenience.
-- -- object: new_database | type: DATABASE --
-- -- DROP DATABASE IF EXISTS new_database;
-- CREATE DATABASE new_database
-- ;
-- -- ddl-end --
-- 

-- object: public.examen_medico | type: TABLE --
-- DROP TABLE IF EXISTS public.examen_medico CASCADE;
CREATE TABLE public.examen_medico(
	id serial NOT NULL,
	fecha date,
	recomendaciones text,
	id_persona integer,
	id_tipo_examen_medico integer,
	id_tipo_programa_examen_medico integer,
	id_concepto_examen_medico integer,
	CONSTRAINT examen_medico_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.examen_medico IS 'Es el examen médico';
-- ddl-end --
ALTER TABLE public.examen_medico OWNER TO postgres;
-- ddl-end --

-- object: public.persona | type: TABLE --
-- DROP TABLE IF EXISTS public.persona CASCADE;
CREATE TABLE public.persona(
	id serial NOT NULL,
	primer_nombre text,
	otro_nombre text,
	primer_apellido text,
	segundo_apellido text,
	fecha_nacimiento date,
	tipo_documento text,
	numero_documento text,
	fecha_expedicion_documento date,
	lugar_especion_documento text,
	tipo_sangre text,
	direccion text,
	telefono_fijo text,
	telefono_movil1 text,
	telefono_movil2 text,
	correo_electronico1 text,
	correo_electronico2 text,
	activo boolean,
	id_genero integer,
	id_estado_civil integer,
	id_entidad integer,
	id_proceso_gestion_integral integer,
	CONSTRAINT persona_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.persona OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_examen_medico | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_examen_medico CASCADE;
CREATE TABLE public.tipo_examen_medico(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT tipo_examen_medico_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_examen_medico OWNER TO postgres;
-- ddl-end --

-- object: tipo_examen_medico_fk | type: CONSTRAINT --
-- ALTER TABLE public.examen_medico DROP CONSTRAINT IF EXISTS tipo_examen_medico_fk CASCADE;
ALTER TABLE public.examen_medico ADD CONSTRAINT tipo_examen_medico_fk FOREIGN KEY (id_tipo_examen_medico)
REFERENCES public.tipo_examen_medico (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.tipo_programa_examen_medico | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_programa_examen_medico CASCADE;
CREATE TABLE public.tipo_programa_examen_medico(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT tipo_programa_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_programa_examen_medico OWNER TO postgres;
-- ddl-end --

-- object: tipo_programa_examen_medico_fk | type: CONSTRAINT --
-- ALTER TABLE public.examen_medico DROP CONSTRAINT IF EXISTS tipo_programa_examen_medico_fk CASCADE;
ALTER TABLE public.examen_medico ADD CONSTRAINT tipo_programa_examen_medico_fk FOREIGN KEY (id_tipo_programa_examen_medico)
REFERENCES public.tipo_programa_examen_medico (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.concepto_examen_medico | type: TABLE --
-- DROP TABLE IF EXISTS public.concepto_examen_medico CASCADE;
CREATE TABLE public.concepto_examen_medico(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT concepto_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.concepto_examen_medico OWNER TO postgres;
-- ddl-end --

-- object: concepto_examen_medico_fk | type: CONSTRAINT --
-- ALTER TABLE public.examen_medico DROP CONSTRAINT IF EXISTS concepto_examen_medico_fk CASCADE;
ALTER TABLE public.examen_medico ADD CONSTRAINT concepto_examen_medico_fk FOREIGN KEY (id_concepto_examen_medico)
REFERENCES public.concepto_examen_medico (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.contrato | type: TABLE --
-- DROP TABLE IF EXISTS public.contrato CASCADE;
CREATE TABLE public.contrato(
	id serial NOT NULL,
	objeto text,
	obra_o_labor text,
	fecha_inicio date,
	fecha_fin date,
	salario_base bigint,
	salario_auxilio bigint,
	dias_periodo_prueba integer,
	id_persona integer,
	id_tipo_contrato integer,
	id_cargo integer,
	id_otrosi integer,
	id_prorroga_contrato integer,
	CONSTRAINT contrato_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.contrato OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_contrato | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_contrato CASCADE;
CREATE TABLE public.tipo_contrato(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT tipo_contrato_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_contrato OWNER TO postgres;
-- ddl-end --

-- object: tipo_contrato_fk | type: CONSTRAINT --
-- ALTER TABLE public.contrato DROP CONSTRAINT IF EXISTS tipo_contrato_fk CASCADE;
ALTER TABLE public.contrato ADD CONSTRAINT tipo_contrato_fk FOREIGN KEY (id_tipo_contrato)
REFERENCES public.tipo_contrato (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.concepto_otrosi | type: TABLE --
-- DROP TABLE IF EXISTS public.concepto_otrosi CASCADE;
CREATE TABLE public.concepto_otrosi(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT concepto_otrosi_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.concepto_otrosi OWNER TO postgres;
-- ddl-end --

-- object: public.prorroga_contrato | type: TABLE --
-- DROP TABLE IF EXISTS public.prorroga_contrato CASCADE;
CREATE TABLE public.prorroga_contrato(
	id serial NOT NULL,
	fecha_inicio date,
	fecha_fin date,
	CONSTRAINT prorroga_contrato_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.prorroga_contrato OWNER TO postgres;
-- ddl-end --

-- object: prorroga_contrato_fk | type: CONSTRAINT --
-- ALTER TABLE public.contrato DROP CONSTRAINT IF EXISTS prorroga_contrato_fk CASCADE;
ALTER TABLE public.contrato ADD CONSTRAINT prorroga_contrato_fk FOREIGN KEY (id_prorroga_contrato)
REFERENCES public.prorroga_contrato (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.cargo | type: TABLE --
-- DROP TABLE IF EXISTS public.cargo CASCADE;
CREATE TABLE public.cargo(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT cargo_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.cargo OWNER TO postgres;
-- ddl-end --

-- object: cargo_fk | type: CONSTRAINT --
-- ALTER TABLE public.contrato DROP CONSTRAINT IF EXISTS cargo_fk CASCADE;
ALTER TABLE public.contrato ADD CONSTRAINT cargo_fk FOREIGN KEY (id_cargo)
REFERENCES public.cargo (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.contrato DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.contrato ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.examen_medico DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.examen_medico ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.profesion | type: TABLE --
-- DROP TABLE IF EXISTS public.profesion CASCADE;
CREATE TABLE public.profesion(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	codigo_snies smallint,
	modalidad_academica text,
	activo boolean,
	CONSTRAINT profresion_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.profesion OWNER TO postgres;
-- ddl-end --

-- object: public.entidad | type: TABLE --
-- DROP TABLE IF EXISTS public.entidad CASCADE;
CREATE TABLE public.entidad(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	id_tipo_entidad integer,
	CONSTRAINT entidad_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.entidad OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_entidad | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_entidad CASCADE;
CREATE TABLE public.tipo_entidad(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden inet,
	activo boolean,
	CONSTRAINT tipo_entidad_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_entidad IS 'EPS, AFP, CCF, CESANTIAS';
-- ddl-end --
ALTER TABLE public.tipo_entidad OWNER TO postgres;
-- ddl-end --

-- object: public.estado_civil | type: TABLE --
-- DROP TABLE IF EXISTS public.estado_civil CASCADE;
CREATE TABLE public.estado_civil(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT estado_civil_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.estado_civil OWNER TO postgres;
-- ddl-end --

-- object: public.proceso_gestion_integral | type: TABLE --
-- DROP TABLE IF EXISTS public.proceso_gestion_integral CASCADE;
CREATE TABLE public.proceso_gestion_integral(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT proceso_gestion_integral_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.proceso_gestion_integral OWNER TO postgres;
-- ddl-end --

-- object: estado_civil_fk | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT IF EXISTS estado_civil_fk CASCADE;
ALTER TABLE public.persona ADD CONSTRAINT estado_civil_fk FOREIGN KEY (id_estado_civil)
REFERENCES public.estado_civil (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: proceso_gestion_integral_fk | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT IF EXISTS proceso_gestion_integral_fk CASCADE;
ALTER TABLE public.persona ADD CONSTRAINT proceso_gestion_integral_fk FOREIGN KEY (id_proceso_gestion_integral)
REFERENCES public.proceso_gestion_integral (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: entidad_fk | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT IF EXISTS entidad_fk CASCADE;
ALTER TABLE public.persona ADD CONSTRAINT entidad_fk FOREIGN KEY (id_entidad)
REFERENCES public.entidad (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.otrosi | type: TABLE --
-- DROP TABLE IF EXISTS public.otrosi CASCADE;
CREATE TABLE public.otrosi(
	id serial NOT NULL,
	fecha_inicio date,
	id_concepto_otrosi integer,
	CONSTRAINT otro_si_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.otrosi OWNER TO postgres;
-- ddl-end --

-- object: otrosi_fk | type: CONSTRAINT --
-- ALTER TABLE public.contrato DROP CONSTRAINT IF EXISTS otrosi_fk CASCADE;
ALTER TABLE public.contrato ADD CONSTRAINT otrosi_fk FOREIGN KEY (id_otrosi)
REFERENCES public.otrosi (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: concepto_otrosi_fk | type: CONSTRAINT --
-- ALTER TABLE public.otrosi DROP CONSTRAINT IF EXISTS concepto_otrosi_fk CASCADE;
ALTER TABLE public.otrosi ADD CONSTRAINT concepto_otrosi_fk FOREIGN KEY (id_concepto_otrosi)
REFERENCES public.concepto_otrosi (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.vivienda | type: TABLE --
-- DROP TABLE IF EXISTS public.vivienda CASCADE;
CREATE TABLE public.vivienda(
	id serial NOT NULL,
	direccion text,
	barrio text,
	departamento integer,
	municipio integer,
	estrato integer,
	id_tipo_vivienda integer,
	CONSTRAINT vivienda_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.vivienda OWNER TO postgres;
-- ddl-end --

-- object: public.educacion_superior | type: TABLE --
-- DROP TABLE IF EXISTS public.educacion_superior CASCADE;
CREATE TABLE public.educacion_superior(
	id serial NOT NULL,
	numero_semestre_aprobados integer,
	graduado boolean,
	fecha_terminacion date,
	numero_tarjeta_profesional text,
	id_profesion integer,
	id_persona integer,
	CONSTRAINT educacion_superior_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.educacion_superior OWNER TO postgres;
-- ddl-end --

-- object: public.educacion_basica_media | type: TABLE --
-- DROP TABLE IF EXISTS public.educacion_basica_media CASCADE;
CREATE TABLE public.educacion_basica_media(
	id serial NOT NULL,
	ultimo_grado integer,
	titulo_obtenido text,
	fecha_grado date,
	id_persona integer,
	CONSTRAINT educacion_basica_media PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.educacion_basica_media OWNER TO postgres;
-- ddl-end --

-- object: profesion_fk | type: CONSTRAINT --
-- ALTER TABLE public.educacion_superior DROP CONSTRAINT IF EXISTS profesion_fk CASCADE;
ALTER TABLE public.educacion_superior ADD CONSTRAINT profesion_fk FOREIGN KEY (id_profesion)
REFERENCES public.profesion (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.genero | type: TABLE --
-- DROP TABLE IF EXISTS public.genero CASCADE;
CREATE TABLE public.genero(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT genero_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.genero OWNER TO postgres;
-- ddl-end --

-- object: genero_fk | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT IF EXISTS genero_fk CASCADE;
ALTER TABLE public.persona ADD CONSTRAINT genero_fk FOREIGN KEY (id_genero)
REFERENCES public.genero (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.tipo_vacuna | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_vacuna CASCADE;
CREATE TABLE public.tipo_vacuna(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	patologia text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT vacunas_id_pk PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_vacuna OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_vivienda | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_vivienda CASCADE;
CREATE TABLE public.tipo_vivienda(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	activo boolean,
	orden integer,
	CONSTRAINT tipo_vivienda_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_vivienda OWNER TO postgres;
-- ddl-end --

-- object: tipo_vivienda_fk | type: CONSTRAINT --
-- ALTER TABLE public.vivienda DROP CONSTRAINT IF EXISTS tipo_vivienda_fk CASCADE;
ALTER TABLE public.vivienda ADD CONSTRAINT tipo_vivienda_fk FOREIGN KEY (id_tipo_vivienda)
REFERENCES public.tipo_vivienda (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.muchos_persona_tiene_muchos_vivienda | type: TABLE --
-- DROP TABLE IF EXISTS public.muchos_persona_tiene_muchos_vivienda CASCADE;
CREATE TABLE public.muchos_persona_tiene_muchos_vivienda(
	id_persona integer NOT NULL,
	id_vivienda integer NOT NULL,
	CONSTRAINT muchos_persona_tiene_muchos_vivienda_pk PRIMARY KEY (id_persona,id_vivienda)

);
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.muchos_persona_tiene_muchos_vivienda DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.muchos_persona_tiene_muchos_vivienda ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE RESTRICT ON UPDATE CASCADE;
-- ddl-end --

-- object: vivienda_fk | type: CONSTRAINT --
-- ALTER TABLE public.muchos_persona_tiene_muchos_vivienda DROP CONSTRAINT IF EXISTS vivienda_fk CASCADE;
ALTER TABLE public.muchos_persona_tiene_muchos_vivienda ADD CONSTRAINT vivienda_fk FOREIGN KEY (id_vivienda)
REFERENCES public.vivienda (id) MATCH FULL
ON DELETE RESTRICT ON UPDATE CASCADE;
-- ddl-end --

-- object: tipo_entidad_fk | type: CONSTRAINT --
-- ALTER TABLE public.entidad DROP CONSTRAINT IF EXISTS tipo_entidad_fk CASCADE;
ALTER TABLE public.entidad ADD CONSTRAINT tipo_entidad_fk FOREIGN KEY (id_tipo_entidad)
REFERENCES public.tipo_entidad (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.educacion_basica_media DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.educacion_basica_media ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: educacion_basica_media_uq | type: CONSTRAINT --
-- ALTER TABLE public.educacion_basica_media DROP CONSTRAINT IF EXISTS educacion_basica_media_uq CASCADE;
ALTER TABLE public.educacion_basica_media ADD CONSTRAINT educacion_basica_media_uq UNIQUE (id_persona);
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.educacion_superior DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.educacion_superior ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.registro_vacuna | type: TABLE --
-- DROP TABLE IF EXISTS public.registro_vacuna CASCADE;
CREATE TABLE public.registro_vacuna(
	id serial NOT NULL,
	fecha_dosis date,
	id_persona integer,
	id_tipo_vacuna integer,
	CONSTRAINT registro_vacuna_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.registro_vacuna OWNER TO postgres;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.registro_vacuna DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.registro_vacuna ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: tipo_vacuna_fk | type: CONSTRAINT --
-- ALTER TABLE public.registro_vacuna DROP CONSTRAINT IF EXISTS tipo_vacuna_fk CASCADE;
ALTER TABLE public.registro_vacuna ADD CONSTRAINT tipo_vacuna_fk FOREIGN KEY (id_tipo_vacuna)
REFERENCES public.tipo_vacuna (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.relacion_personas | type: TABLE --
-- DROP TABLE IF EXISTS public.relacion_personas CASCADE;
CREATE TABLE public.relacion_personas(
	id serial NOT NULL,
	id_persona1 integer,
	id_persona2 integer,
	id_tipo_relacion_personas integer,
	CONSTRAINT relacion_de_persona_id_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.relacion_personas OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_relacion_personas | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_relacion_personas CASCADE;
CREATE TABLE public.tipo_relacion_personas(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT tipo_relacion_pkey PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_relacion_personas OWNER TO postgres;
-- ddl-end --

-- object: tipo_relacion_personas_fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS tipo_relacion_personas_fk CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT tipo_relacion_personas_fk FOREIGN KEY (id_tipo_relacion_personas)
REFERENCES public.tipo_relacion_personas (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.talla_vestimenta | type: TABLE --
-- DROP TABLE IF EXISTS public.talla_vestimenta CASCADE;
CREATE TABLE public.talla_vestimenta(
	id serial NOT NULL,
	talla text,
	fecha_creacion date,
	id_persona integer,
	id_tipo_vestimenta integer,
	CONSTRAINT tallas_vestimenta_pky PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.talla_vestimenta OWNER TO postgres;
-- ddl-end --

-- object: public.entrega_elemento_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.entrega_elemento_dotacion CASCADE;
CREATE TABLE public.entrega_elemento_dotacion(
	id serial NOT NULL,
	id_elemento_dotacion integer,
	id_persona integer,
	CONSTRAINT entrega_dotacion_pky PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.entrega_elemento_dotacion OWNER TO postgres;
-- ddl-end --

-- object: public.elemento_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.elemento_dotacion CASCADE;
CREATE TABLE public.elemento_dotacion(
	id serial NOT NULL,
	fecha_entrega_dotacion date,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	id_tipo_elemento_dotacion integer,
	CONSTRAINT entrega_dotacion_pky PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.elemento_dotacion OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_elemento_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_elemento_dotacion CASCADE;
CREATE TABLE public.tipo_elemento_dotacion(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT elementos_proteccion_personal_pky PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_elemento_dotacion OWNER TO postgres;
-- ddl-end --

-- object: elemento_dotacion_fk | type: CONSTRAINT --
-- ALTER TABLE public.entrega_elemento_dotacion DROP CONSTRAINT IF EXISTS elemento_dotacion_fk CASCADE;
ALTER TABLE public.entrega_elemento_dotacion ADD CONSTRAINT elemento_dotacion_fk FOREIGN KEY (id_elemento_dotacion)
REFERENCES public.elemento_dotacion (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.tipo_vestimenta | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_vestimenta CASCADE;
CREATE TABLE public.tipo_vestimenta(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT tipo_medidas_vestiment_pky PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_vestimenta OWNER TO postgres;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.talla_vestimenta DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.talla_vestimenta ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: tipo_vestimenta_fk | type: CONSTRAINT --
-- ALTER TABLE public.talla_vestimenta DROP CONSTRAINT IF EXISTS tipo_vestimenta_fk CASCADE;
ALTER TABLE public.talla_vestimenta ADD CONSTRAINT tipo_vestimenta_fk FOREIGN KEY (id_tipo_vestimenta)
REFERENCES public.tipo_vestimenta (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.entrega_elemento_dotacion DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.entrega_elemento_dotacion ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: tipo_elemento_dotacion_fk | type: CONSTRAINT --
-- ALTER TABLE public.elemento_dotacion DROP CONSTRAINT IF EXISTS tipo_elemento_dotacion_fk CASCADE;
ALTER TABLE public.elemento_dotacion ADD CONSTRAINT tipo_elemento_dotacion_fk FOREIGN KEY (id_tipo_elemento_dotacion)
REFERENCES public.tipo_elemento_dotacion (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: elemento_dotacion_uq | type: CONSTRAINT --
-- ALTER TABLE public.elemento_dotacion DROP CONSTRAINT IF EXISTS elemento_dotacion_uq CASCADE;
ALTER TABLE public.elemento_dotacion ADD CONSTRAINT elemento_dotacion_uq UNIQUE (id_tipo_elemento_dotacion);
-- ddl-end --

-- object: public.cuenta_bancaria | type: TABLE --
-- DROP TABLE IF EXISTS public.cuenta_bancaria CASCADE;
CREATE TABLE public.cuenta_bancaria(
	id serial NOT NULL,
	numero text,
	principal boolean,
	id_persona integer,
	id_tipo_cuenta_bancaria integer,
	id_entidad_financiera integer,
	CONSTRAINT id PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.cuenta_bancaria OWNER TO postgres;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.cuenta_bancaria DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.cuenta_bancaria ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.tipo_cuenta_bancaria | type: TABLE --
-- DROP TABLE IF EXISTS public.tipo_cuenta_bancaria CASCADE;
CREATE TABLE public.tipo_cuenta_bancaria(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT id PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.tipo_cuenta_bancaria OWNER TO postgres;
-- ddl-end --

-- object: tipo_cuenta_bancaria_fk | type: CONSTRAINT --
-- ALTER TABLE public.cuenta_bancaria DROP CONSTRAINT IF EXISTS tipo_cuenta_bancaria_fk CASCADE;
ALTER TABLE public.cuenta_bancaria ADD CONSTRAINT tipo_cuenta_bancaria_fk FOREIGN KEY (id_tipo_cuenta_bancaria)
REFERENCES public.tipo_cuenta_bancaria (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.entidad_financiera | type: TABLE --
-- DROP TABLE IF EXISTS public.entidad_financiera CASCADE;
CREATE TABLE public.entidad_financiera(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT id PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.entidad_financiera OWNER TO postgres;
-- ddl-end --

-- object: entidad_financiera_fk | type: CONSTRAINT --
-- ALTER TABLE public.cuenta_bancaria DROP CONSTRAINT IF EXISTS entidad_financiera_fk CASCADE;
ALTER TABLE public.cuenta_bancaria ADD CONSTRAINT entidad_financiera_fk FOREIGN KEY (id_entidad_financiera)
REFERENCES public.entidad_financiera (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: relacion_personas_id_persona1_fkey | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS relacion_personas_id_persona1_fkey CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT relacion_personas_id_persona1_fkey FOREIGN KEY (id_persona1)
REFERENCES public.persona (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --

-- object: relacion_personas_id_persona2_fkey | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS relacion_personas_id_persona2_fkey CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT relacion_personas_id_persona2_fkey FOREIGN KEY (id_persona2)
REFERENCES public.persona (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


