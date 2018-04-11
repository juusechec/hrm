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
	CONSTRAINT examen_medico__id__pk PRIMARY KEY (id)

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
	CONSTRAINT persona__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.persona IS 'Entidad que define todos los atributos de las personas que intervienen en la organización directa o indirectamente';
-- ddl-end --
COMMENT ON COLUMN public.persona.primer_nombre IS 'Primer Nombre de la persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.otro_nombre IS 'Segundos y terceros nombres de la persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.primer_apellido IS 'Primer Apellido de la Persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.segundo_apellido IS 'Segundo Apellido de la persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.fecha_nacimiento IS 'Fecha de nacimiento de la persona en el formato aaaa-mm-dd';
-- ddl-end --
COMMENT ON COLUMN public.persona.tipo_documento IS 'Identifica el tipo de documento de la persona solo admite los siguientes valores RC = Registro Civil, TI = Tarjeta de identidad, CC=Cedula de Ciudadania, CE = Cedula de Extranjeria';
-- ddl-end --
COMMENT ON COLUMN public.persona.numero_documento IS 'Solo admite datos tipos numéricos para los casos RC, TI, CC, Para la cedula de extranjería admite según formato de la registraduria civil';
-- ddl-end --
COMMENT ON COLUMN public.persona.lugar_especion_documento IS 'Lugar en donde se expide el documento de identidad';
-- ddl-end --
COMMENT ON COLUMN public.persona.tipo_sangre IS 'Se ingresa el grupo sanguíneo y el Factor del RH solo admite las siguientes letras en el grupo sanguíneo A, B, O. Solo admite los siguientes caracteres en el facto RH "+", "-" ejemplo "O+", "O-", "AB-';
-- ddl-end --
COMMENT ON COLUMN public.persona.direccion IS 'Dirección donde reside la persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.telefono_fijo IS 'Telefono fijo donde reside la persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.telefono_movil1 IS 'Teléfono móvil de la persona con indicativo del país si reside fuera de Colombia, ejemplo (+57) 310 208 3828';
-- ddl-end --
COMMENT ON COLUMN public.persona.telefono_movil2 IS 'numeró teléfono móvil alterno, ejemplo (+57) 310 208 3828';
-- ddl-end --
COMMENT ON COLUMN public.persona.correo_electronico1 IS 'correo electrónico principal de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter Ejemplo  (+57) 310 208 3828"."';
-- ddl-end --
COMMENT ON COLUMN public.persona.correo_electronico2 IS 'correo electrónico secundario de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter "."';
-- ddl-end --
COMMENT ON COLUMN public.persona.activo IS 'valor booleano que permite retratar si el usuario se encuentra activo dentro de la base de datos, y permite incluirlo en busquedas según clasificaciones propias de toda la base de datos';
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
	CONSTRAINT tipo_examen_medico__id__pk PRIMARY KEY (id)

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
	CONSTRAINT tipo_programa__id__pk PRIMARY KEY (id)

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
	CONSTRAINT concepto__id__pk PRIMARY KEY (id)

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
	CONSTRAINT contrato__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.contrato IS 'tabla de los posibles contratos celebrados con los usuarios de organización en donde se enlaza los tipos de contratos ';
-- ddl-end --
COMMENT ON COLUMN public.contrato.id IS 'primry key, tabla de contratos';
-- ddl-end --
COMMENT ON COLUMN public.contrato.objeto IS 'texto donde se especifíca el objeto del contrato a celebrar';
-- ddl-end --
COMMENT ON COLUMN public.contrato.obra_o_labor IS 'texto que se describe obra a labor en la firma del contrato';
-- ddl-end --
COMMENT ON COLUMN public.contrato.fecha_inicio IS 'fecha en la que se inicia el contrato';
-- ddl-end --
COMMENT ON COLUMN public.contrato.fecha_fin IS 'fecha en la que finaliza el contrato';
-- ddl-end --
COMMENT ON COLUMN public.contrato.salario_base IS 'salario base a devengar el contratante';
-- ddl-end --
COMMENT ON COLUMN public.contrato.salario_auxilio IS 'salario que se asigna ';
-- ddl-end --
COMMENT ON COLUMN public.contrato.dias_periodo_prueba IS 'valor entero de los días que se da un periodo de prueba al contratante';
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
	CONSTRAINT tipo_contrato__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_contrato IS 'colección de datos, permite cualificar los tipos de contrato que existen';
-- ddl-end --
COMMENT ON COLUMN public.tipo_contrato.id IS 'primary key, tipo de contrato';
-- ddl-end --
COMMENT ON COLUMN public.tipo_contrato.nombre IS 'enuncia el nombre de la modalidad de contrato';
-- ddl-end --
COMMENT ON COLUMN public.tipo_contrato.descripcion IS 'Descripción de la tipología del contacto';
-- ddl-end --
COMMENT ON COLUMN public.tipo_contrato.abreviacion IS 'Abreviatura de tres letras del tipo de contrato';
-- ddl-end --
COMMENT ON COLUMN public.tipo_contrato.orden IS 'Entero que se asigna para la visualización del tipo de contrato';
-- ddl-end --
COMMENT ON COLUMN public.tipo_contrato.activo IS 'Valor booleano, valida que el tipo de contrato este activo ';
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
	CONSTRAINT concepto_otrosi__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.concepto_otrosi IS 'Colección de datos, se enuncia los posibles conceptos de otro si en los contratos ';
-- ddl-end --
COMMENT ON COLUMN public.concepto_otrosi.id IS 'primary key, conceptos otro si';
-- ddl-end --
COMMENT ON COLUMN public.concepto_otrosi.nombre IS 'nombre del concepto de otro si';
-- ddl-end --
COMMENT ON COLUMN public.concepto_otrosi.descripcion IS 'describe el concepto de otro si en el contrato';
-- ddl-end --
COMMENT ON COLUMN public.concepto_otrosi.abreviacion IS 'Abreviación de tres letras, del concepto de otro si';
-- ddl-end --
COMMENT ON COLUMN public.concepto_otrosi.orden IS 'nùmero entero, que muestra el orden en que se visualiza los conceptos de otro si al momento de visualizarlos';
-- ddl-end --
COMMENT ON COLUMN public.concepto_otrosi.activo IS 'valor booleano, indica si el concepto esta activo en los conceptos de otros si en la organización para aplicarlo  en el contrato';
-- ddl-end --
ALTER TABLE public.concepto_otrosi OWNER TO postgres;
-- ddl-end --

-- object: public.prorroga_contrato | type: TABLE --
-- DROP TABLE IF EXISTS public.prorroga_contrato CASCADE;
CREATE TABLE public.prorroga_contrato(
	id serial NOT NULL,
	fecha_inicio date,
	fecha_fin date,
	CONSTRAINT prorroga_contrato__id__pk PRIMARY KEY (id)

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
	CONSTRAINT cargo__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.cargo IS 'catálogo de datos, tabla de cargos de la organización';
-- ddl-end --
COMMENT ON COLUMN public.cargo.id IS 'primary key, tabla de dargos';
-- ddl-end --
COMMENT ON COLUMN public.cargo.nombre IS 'nombre del cargo ';
-- ddl-end --
COMMENT ON COLUMN public.cargo.descripcion IS 'descripción de las funciones adjuntas al cargo';
-- ddl-end --
COMMENT ON COLUMN public.cargo.abreviacion IS 'abreviación con tres letras del cargo';
-- ddl-end --
COMMENT ON COLUMN public.cargo.orden IS 'número entero, en que orden se desea mostrar los cargos  al momentos de ser asignados a un contrato';
-- ddl-end --
COMMENT ON COLUMN public.cargo.activo IS 'valor booleano, identifica si el cargo se encuentra activo en la organización o no';
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
	CONSTRAINT profesion__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.profesion IS 'catálogo de profesiones';
-- ddl-end --
COMMENT ON COLUMN public.profesion.id IS 'llave primaria de las profesiones';
-- ddl-end --
COMMENT ON COLUMN public.profesion.nombre IS 'nombre de la profesión';
-- ddl-end --
COMMENT ON COLUMN public.profesion.descripcion IS 'descripción, y área de aplicación de la carrera';
-- ddl-end --
COMMENT ON COLUMN public.profesion.abreviacion IS 'abreviatura para la profesión tamaño del campo de tres caracteres';
-- ddl-end --
COMMENT ON COLUMN public.profesion.orden IS 'campo tipo entero donde se organiza el orden de visualización ';
-- ddl-end --
COMMENT ON COLUMN public.profesion.codigo_snies IS 'Código de la profesión según el ministerio de educación nacional';
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
	CONSTRAINT entidad__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.entidad IS 'catálogo de entidades ';
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
	CONSTRAINT tipo_entidad__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_entidad IS 'EPS, AFP, CCF, CESANTIAS';
-- ddl-end --
COMMENT ON COLUMN public.tipo_entidad.id IS 'primary key del tipo de entidad';
-- ddl-end --
COMMENT ON COLUMN public.tipo_entidad.nombre IS 'nombre del tipo de la entidad';
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
	CONSTRAINT estado_civil__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.estado_civil IS 'Catálogo de opciones donde se anotaran las posibles opciones del estado civil que puedan tener las personas y que sean relacionadas por la ley';
-- ddl-end --
COMMENT ON COLUMN public.estado_civil.id IS 'llave primaria del estado civil';
-- ddl-end --
COMMENT ON COLUMN public.estado_civil.nombre IS 'nombre breve del tipo de estado civil';
-- ddl-end --
COMMENT ON COLUMN public.estado_civil.descripcion IS 'se enuncia cuál es la característica de éste estado, y como se soporta ante entidad competente';
-- ddl-end --
COMMENT ON COLUMN public.estado_civil.abreviacion IS 'abreviatura de cada estado civil';
-- ddl-end --
COMMENT ON COLUMN public.estado_civil.orden IS 'orden en le que se va a mostrar los tipos de estado civil al usuario final';
-- ddl-end --
COMMENT ON COLUMN public.estado_civil.activo IS 'permite activar opciones en el caso que hay activas de los posibles estados civiles ';
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
	CONSTRAINT proceso_gestion_integral__id__pk PRIMARY KEY (id)

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
	CONSTRAINT otrosi__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.otrosi IS 'Tabla que registra otros casos en el contrato';
-- ddl-end --
COMMENT ON COLUMN public.otrosi.id IS 'primary key, tabla otro_si';
-- ddl-end --
COMMENT ON COLUMN public.otrosi.fecha_inicio IS 'fecha en la que entra en vigencia  el otro si al contrato';
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
	CONSTRAINT vivienda__id__pk PRIMARY KEY (id)

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
	CONSTRAINT educacion_superior__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.educacion_superior IS 'Enlaza a los usuarios de la base de datos con la catálogo de profesiones que maneja el modelo de negocio';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.id IS 'llave primaria para tabla que relaciona usuario con listado profesiones';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.numero_semestre_aprobados IS 'En caso de haber finalizado sus estudios superiores, indica la cantidad de semestres cursados, campo de tipo numérico';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.graduado IS 'variable booleana que indica si logro o no el grado en dicha profesión';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.fecha_terminacion IS 'fecha en a que recibió el grado del tipo aaaa-mm-dd';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.numero_tarjeta_profesional IS 'número de la tarjeta profesional otorgado por la entidad reguladora';
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
	CONSTRAINT educacion_basica_media__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.educacion_basica_media IS 'Enuncia a información de la educación básica de los empleados de la organización';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.id IS 'identificador primario tabla de educacion basica';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.ultimo_grado IS 'ultimo grado aprobado, en caso de no haber finalizado indicar hasta que grado se alcanzo a llegar campo de texto';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.titulo_obtenido IS 'titulo obtenido al momento de culminar los estudios básicos';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.fecha_grado IS 'fecha en la que recibio el grado de la forma aaaa-mm-dd';
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
	CONSTRAINT genero__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.genero IS 'colección de datos,  listado de géneros posibles';
-- ddl-end --
COMMENT ON COLUMN public.genero.id IS 'primary key, listado de genero';
-- ddl-end --
COMMENT ON COLUMN public.genero.nombre IS 'nombre del genero ';
-- ddl-end --
COMMENT ON COLUMN public.genero.descripcion IS 'breve característica del genero, y posible características  del mismo, y como sustentar médicamente esta condición';
-- ddl-end --
COMMENT ON COLUMN public.genero.abreviacion IS 'abreviatura de tres letras para el genero';
-- ddl-end --
COMMENT ON COLUMN public.genero.orden IS 'número de orden en las que se visualizaran al momento de desplegarlas';
-- ddl-end --
COMMENT ON COLUMN public.genero.activo IS 'valor booleano que indica si esta en vigencia o no la base de datos';
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
	CONSTRAINT tipo_vacuna__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_vacuna IS 'catálogo de vacunas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.id IS 'llave primaria, catálogo de vacunas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.nombre IS 'nombre de la vacuna';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.descripcion IS 'Descripción de que compone la vacua,  dosificación ';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.patologia IS 'patología y enfermedades para la cual sirve la vacuna';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.abreviacion IS 'abreviación de la vacuna máximo tres caracteres';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.orden IS 'valor entero en cual se asigna en que orden en que se visualizara';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.activo IS 'valor booleano que nos indica si la vacuna se encuentra activa o inactiva';
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
	CONSTRAINT tipo_vivienda__id__pk PRIMARY KEY (id)

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
	CONSTRAINT registro_vacuna__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.registro_vacuna IS 'tabla que registra la fecha de la vacuna , con el usuario';
-- ddl-end --
COMMENT ON COLUMN public.registro_vacuna.id IS 'llave primaria,  registro de la vacunación';
-- ddl-end --
COMMENT ON COLUMN public.registro_vacuna.fecha_dosis IS 'fecha en la que se aplico la dosis';
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
	CONSTRAINT relacion_personas__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.relacion_personas IS 'Tabla que relaciona a un usuario con la posible relación filial de hecho o familiar que pueda tener  con otros usuarios de la organizacional';
-- ddl-end --
COMMENT ON COLUMN public.relacion_personas.id IS 'llave primaria de la tabla relación personas';
-- ddl-end --
COMMENT ON COLUMN public.relacion_personas.id_persona1 IS 'es la llave forania de la tabla persona';
-- ddl-end --
COMMENT ON COLUMN public.relacion_personas.id_persona2 IS 'Es la llave forania con la tabla persona';
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
	CONSTRAINT tipo_relacion_personas__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_relacion_personas IS 'Tabla tipo catálogo que indica los tipos de relaciones que existen entre personas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.id IS 'llave primaria de la tabla relación de las personas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.nombre IS 'se enunciará el tipo de relación de las personas ';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.descripcion IS 'Descripción breve del tipo de relación';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.abreviacion IS 'se notara una abreviatura para el tipo de relación';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.orden IS 'valor numérico variable que permitirá dar un orden al momento de presentación de los datos ';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.activo IS 'Valor booleano que denotará si la relación establecida es vigente o si ya no puede ser mas considerada como una relación entre personas';
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
	CONSTRAINT talla_vestimenta__id__pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.talla_vestimenta IS 'Tabla que relaciona las tallas en las que ';
-- ddl-end --
COMMENT ON COLUMN public.talla_vestimenta.id IS 'llave primaria de  talla de vestimenta';
-- ddl-end --
COMMENT ON COLUMN public.talla_vestimenta.talla IS 'unidad de medida de la talla que se esta midiendo';
-- ddl-end --
COMMENT ON COLUMN public.talla_vestimenta.fecha_creacion IS 'feha en la que se toma la medida de la talla';
-- ddl-end --
ALTER TABLE public.talla_vestimenta OWNER TO postgres;
-- ddl-end --

-- object: public.entrega_elemento_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.entrega_elemento_dotacion CASCADE;
CREATE TABLE public.entrega_elemento_dotacion(
	id serial NOT NULL,
	id_elemento_dotacion integer,
	id_persona integer,
	CONSTRAINT entrega_dotacion__id__pk PRIMARY KEY (id)

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
	CONSTRAINT elemento_dotacion__id__pk PRIMARY KEY (id)

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
	CONSTRAINT tipo_elemento_dotacion__id__pk PRIMARY KEY (id)

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
	CONSTRAINT tipo_vestimenta__id__pk PRIMARY KEY (id)

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
	CONSTRAINT cuenta_bancaria__id__pk PRIMARY KEY (id)

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
	CONSTRAINT tipo_cuenta_bancaria__id__pk PRIMARY KEY (id)

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
	CONSTRAINT entidad_financiera__id__pk PRIMARY KEY (id)

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

-- object: relacion_personas__id_persona1__fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS relacion_personas__id_persona1__fk CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT relacion_personas__id_persona1__fk FOREIGN KEY (id_persona1)
REFERENCES public.persona (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --

-- object: relacion_personas__id_persona2__fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS relacion_personas__id_persona2__fk CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT relacion_personas__id_persona2__fk FOREIGN KEY (id_persona2)
REFERENCES public.persona (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


