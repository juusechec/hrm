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
	CONSTRAINT examen_medico_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.examen_medico IS 'Es el examen médico que se realiza por petición de la empresa para ver qué tan apta es una persona para el trabajo o simplemente para revisar la calidad de estos.';
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
	lugar_expedicion_documento text,
	tipo_sangre text,
	telefono_fijo text,
	telefono_movil1 text,
	telefono_movil2 text,
	correo_electronico1 text,
	correo_electronico2 text,
	activo boolean,
	id_genero integer,
	id_estado_civil integer,
	id_proceso_gestion_integral integer,
	CONSTRAINT persona_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.persona IS 'Es la entidad que define todos los atributos básicos de las personas que intervienen en la organización directa o indirectamente. Como trabajadores directos, contratistas, subcontratados, familiares, etc.';
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
COMMENT ON COLUMN public.persona.lugar_expedicion_documento IS 'Lugar en donde se expide el documento de identidad';
-- ddl-end --
COMMENT ON COLUMN public.persona.tipo_sangre IS 'Se ingresa el grupo sanguíneo y el Factor del RH solo admite las siguientes letras en el grupo sanguíneo A, B, O. Solo admite los siguientes caracteres en el facto RH +, - ejemplo O+, O-, AB-';
-- ddl-end --
COMMENT ON COLUMN public.persona.telefono_fijo IS 'Telefono fijo donde reside la persona';
-- ddl-end --
COMMENT ON COLUMN public.persona.telefono_movil1 IS 'Teléfono móvil de la persona con indicativo del país si reside fuera de Colombia, ejemplo (+57) 310 208 3828';
-- ddl-end --
COMMENT ON COLUMN public.persona.telefono_movil2 IS 'numeró teléfono móvil alterno, ejemplo (+57) 310 208 3828';
-- ddl-end --
COMMENT ON COLUMN public.persona.correo_electronico1 IS 'correo electrónico principal de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter Ejemplo  (+57) 310 208 3828.';
-- ddl-end --
COMMENT ON COLUMN public.persona.correo_electronico2 IS 'correo electrónico secundario de contacto, en caso de ser diligenciado es obligatorio el carácter @ seguido de texto y el caracter .';
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
	CONSTRAINT tipo_examen_medico_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_examen_medico IS 'Es el tipo de examen médico qué se asocia a la empresa, por ejemplo Ingreso, Periódico, Retiro, PostIncapacidad, Cambio Oficio.';
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
	CONSTRAINT tipo_programa_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_programa_examen_medico IS 'Es el tipo de programa del examen médico, programa que crea la empresa para dar un contexto al examen médico, como vigilancia DME, programa visual, programa auditivo, programa estilos de vida saludable, etc.';
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
	CONSTRAINT concepto_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.concepto_examen_medico IS 'Concepto del examen médico, como el veredicto de si es apto, no apto, restricción y aplazado.';
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
	CONSTRAINT contrato_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.contrato IS 'Tabla de los posibles contratos celebrados con los usuarios de organización en donde se enlaza los tipos de contratos.';
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
COMMENT ON COLUMN public.contrato.salario_auxilio IS 'salario que se asigna';
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
	CONSTRAINT tipo_contrato_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_contrato IS 'Posee el tipo de contrato e inderectamente la forma de vinculación a la empresa, como prestación de servicios, obra labor, fijo inferior a un año, aprendizaje SENA, pasante, etc.';
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
COMMENT ON COLUMN public.tipo_contrato.activo IS 'Valor booleano, valida que el tipo de contrato este activo';
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
	CONSTRAINT concepto_otrosi_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.concepto_otrosi IS 'Colección de datos, se enuncia los posibles conceptos de otro si en los contratos, estos conceptos pueden ser cambio salario, cambio objeto de contrato, cambio de cargo y en general cambio de condiciones.';
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
	CONSTRAINT prorroga_contrato_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.prorroga_contrato IS 'Los contratos poseen prorrogas, qué son aplazar la extensión del contrato para poder cumplir más objetivos o los objetivos iniciales.';
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
	CONSTRAINT cargo_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.cargo IS 'catálogo de datos, tabla de cargos de la organización, los roles que se desarrollan dentro de la empresa.';
-- ddl-end --
COMMENT ON COLUMN public.cargo.id IS 'primary key, tabla de dargos';
-- ddl-end --
COMMENT ON COLUMN public.cargo.nombre IS 'nombre del cargo';
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

-- object: public.titulo_academico | type: TABLE --
-- DROP TABLE IF EXISTS public.titulo_academico CASCADE;
CREATE TABLE public.titulo_academico(
	id serial NOT NULL,
	nombre text,
	codigo_snies integer,
	modalidad_academica text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT profesion_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.titulo_academico IS 'Catálogo de profesiones disponbiles o títulos académicos, como pregrado, especialización, maestría y doctorado.';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.id IS 'llave primaria de las profesiones';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.nombre IS 'nombre de la profesión';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.codigo_snies IS 'Código de la profesión según el ministerio de educación nacional';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.modalidad_academica IS 'modalidad como presencial, virtual, etc.';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.descripcion IS 'descripción, y área de aplicación de la carrera';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.abreviacion IS 'abreviatura para la profesión tamaño del campo de tres caracteres';
-- ddl-end --
COMMENT ON COLUMN public.titulo_academico.orden IS 'campo tipo entero donde se organiza el orden de visualización';
-- ddl-end --
ALTER TABLE public.titulo_academico OWNER TO postgres;
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
	CONSTRAINT entidad_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.entidad IS 'Catálogo de entidades, EPS, ARL, BANCOS, entidades financieras, etc.';
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
	orden integer,
	activo boolean,
	CONSTRAINT tipo_entidad_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_entidad IS 'Por ejemplo EPS, AFP, CCF, CESANTIAS, Banco, realmente cualquier tipo de empresa qué exista';
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
	CONSTRAINT estado_civil_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.estado_civil IS 'Catálogo de opciones donde se anotaran las posibles opciones del estado civil que puedan tener las personas y que sean relacionadas por la ley. Soltero, casado, divorciado, etc.';
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
COMMENT ON COLUMN public.estado_civil.activo IS 'permite activar opciones en el caso que hay activas de los posibles estados civiles';
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
	CONSTRAINT proceso_gestion_integral_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.proceso_gestion_integral IS 'En la empresa hay varios procesos misionales o técnicos, una persona que trabaje en la empresa puede pertenecer a uno de ellos.';
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

-- object: public.otrosi | type: TABLE --
-- DROP TABLE IF EXISTS public.otrosi CASCADE;
CREATE TABLE public.otrosi(
	id serial NOT NULL,
	fecha_inicio date,
	id_concepto_otrosi integer,
	CONSTRAINT otrosi_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.otrosi IS 'Tabla que registra cambios de condiciones laborales sobre el contrato.';
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
	estrato integer,
	pais integer,
	departamento integer,
	municipio integer,
	id_tipo_vivienda integer,
	id_persona integer,
	CONSTRAINT vivienda_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.vivienda IS 'Registra la vivienda de la persona.';
-- ddl-end --
ALTER TABLE public.vivienda OWNER TO postgres;
-- ddl-end --

-- object: public.educacion_superior | type: TABLE --
-- DROP TABLE IF EXISTS public.educacion_superior CASCADE;
CREATE TABLE public.educacion_superior(
	id serial NOT NULL,
	numero_semestre_aprobados integer,
	graduado boolean,
	fecha_grado date,
	fecha_expedicion_tarjeta_profesional date,
	fecha_vencimiento_tarjeta_profesional date,
	numero_tarjeta_profesional text,
	id_titulo_academico integer,
	id_persona integer,
	CONSTRAINT educacion_superior_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.educacion_superior IS 'Enlaza a los usuarios de la base de datos con la catálogo de profesiones que maneja el modelo de negocio.';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.id IS 'llave primaria para tabla que relaciona usuario con listado profesiones';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.numero_semestre_aprobados IS 'En caso de haber finalizado sus estudios superiores, indica la cantidad de semestres cursados, campo de tipo numérico';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.graduado IS 'variable booleana que indica si logro o no el grado en dicha profesión';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.fecha_grado IS 'fecha en a que recibió el grado del tipo aaaa-mm-dd';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.fecha_vencimiento_tarjeta_profesional IS 'Si aplica fecha de vencimiento, registrarla';
-- ddl-end --
COMMENT ON COLUMN public.educacion_superior.numero_tarjeta_profesional IS 'número de la tarjeta profesional otorgado por la entidad reguladora';
-- ddl-end --
ALTER TABLE public.educacion_superior OWNER TO postgres;
-- ddl-end --

-- object: public.educacion_basica_media | type: TABLE --
-- DROP TABLE IF EXISTS public.educacion_basica_media CASCADE;
CREATE TABLE public.educacion_basica_media(
	id serial NOT NULL,
	ultimo_grado_aprobado integer,
	titulo_obtenido text,
	fecha_grado date,
	id_persona integer,
	CONSTRAINT educacion_basica_media_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.educacion_basica_media IS 'Enuncia a información de la educación básica de los empleados de la organización.';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.id IS 'identificador primario tabla de educacion basica';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.ultimo_grado_aprobado IS 'ultimo grado aprobado, en caso de no haber finalizado indicar hasta que grado se alcanzo a llegar campo de texto';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.titulo_obtenido IS 'titulo obtenido al momento de culminar los estudios básicos';
-- ddl-end --
COMMENT ON COLUMN public.educacion_basica_media.fecha_grado IS 'fecha en la que recibio el grado de la forma aaaa-mm-dd';
-- ddl-end --
ALTER TABLE public.educacion_basica_media OWNER TO postgres;
-- ddl-end --

-- object: titulo_academico_fk | type: CONSTRAINT --
-- ALTER TABLE public.educacion_superior DROP CONSTRAINT IF EXISTS titulo_academico_fk CASCADE;
ALTER TABLE public.educacion_superior ADD CONSTRAINT titulo_academico_fk FOREIGN KEY (id_titulo_academico)
REFERENCES public.titulo_academico (id) MATCH FULL
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
	CONSTRAINT genero_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.genero IS 'Colección de datos,  listado de géneros o identidades de género posibles.';
-- ddl-end --
COMMENT ON COLUMN public.genero.id IS 'primary key, listado de genero';
-- ddl-end --
COMMENT ON COLUMN public.genero.nombre IS 'nombre del genero';
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
	CONSTRAINT tipo_vacuna_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_vacuna IS 'Catálogo de vacunas.';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.id IS 'llave primaria, catálogo de vacunas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.nombre IS 'nombre de la vacuna';
-- ddl-end --
COMMENT ON COLUMN public.tipo_vacuna.descripcion IS 'Descripción de que compone la vacua,  dosificación';
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
	CONSTRAINT tipo_vivienda_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_vivienda IS 'El tipo de vivienda que posee una persona. Propia, arrendada o familiar.';
-- ddl-end --
ALTER TABLE public.tipo_vivienda OWNER TO postgres;
-- ddl-end --

-- object: tipo_vivienda_fk | type: CONSTRAINT --
-- ALTER TABLE public.vivienda DROP CONSTRAINT IF EXISTS tipo_vivienda_fk CASCADE;
ALTER TABLE public.vivienda ADD CONSTRAINT tipo_vivienda_fk FOREIGN KEY (id_tipo_vivienda)
REFERENCES public.tipo_vivienda (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
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
	fecha_vencimiento_dosis smallint,
	observacion text,
	id_persona integer,
	id_tipo_vacuna integer,
	CONSTRAINT registro_vacuna_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.registro_vacuna IS 'Tabla que registra la fecha de la vacuna, con el usuario y otros datos de la dosis.';
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
	CONSTRAINT relacion_personas_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.relacion_personas IS 'Tabla que relaciona a un usuario con la posible relación filial de hecho o familiar que pueda tener con otros usuarios de la organizacional. Ejemplo, pedro es padre de ana, juan es hermano de carolina, etc.';
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
	CONSTRAINT tipo_relacion_personas_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_relacion_personas IS 'Tabla tipo catálogo que indica los tipos de relaciones que existen entre personas. Ejemplo, hijo, hermano, padre, madre, conyuge.';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.id IS 'llave primaria de la tabla relación de las personas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.nombre IS 'se enunciará el tipo de relación de las personas';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.descripcion IS 'Descripción breve del tipo de relación';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.abreviacion IS 'se notara una abreviatura para el tipo de relación';
-- ddl-end --
COMMENT ON COLUMN public.tipo_relacion_personas.orden IS 'valor numérico variable que permitirá dar un orden al momento de presentación de los datos';
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

-- object: public.talla_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.talla_dotacion CASCADE;
CREATE TABLE public.talla_dotacion(
	id serial NOT NULL,
	numero text,
	unidades text,
	fecha_registro date,
	id_persona integer,
	id_elemento_dotacion integer,
	CONSTRAINT talla_vestimenta_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.talla_dotacion IS 'Tabla que relaciona las tallas de vestimentas de una persona, guarda el histórico de cambio de vestimenta.';
-- ddl-end --
COMMENT ON COLUMN public.talla_dotacion.id IS 'llave primaria de  talla de vestimenta';
-- ddl-end --
COMMENT ON COLUMN public.talla_dotacion.numero IS 'Número de la talla de la talla que se esta midiendo. Ejemplo, 20, 20, XL, XXL, etc.';
-- ddl-end --
COMMENT ON COLUMN public.talla_dotacion.unidades IS 'Unidades en qué se está midiendo la talla. Ejemplo cm, ml, pulgadas.';
-- ddl-end --
COMMENT ON COLUMN public.talla_dotacion.fecha_registro IS 'feha en la que se toma la medida de la talla';
-- ddl-end --
ALTER TABLE public.talla_dotacion OWNER TO postgres;
-- ddl-end --

-- object: public.entrega_elemento_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.entrega_elemento_dotacion CASCADE;
CREATE TABLE public.entrega_elemento_dotacion(
	id serial NOT NULL,
	fecha_entrega_dotacion date,
	id_persona integer,
	id_elemento_dotacion integer,
	CONSTRAINT entrega_dotacion_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.entrega_elemento_dotacion IS 'Es la fecha en que se le entrega la dotación a una persona.';
-- ddl-end --
ALTER TABLE public.entrega_elemento_dotacion OWNER TO postgres;
-- ddl-end --

-- object: public.elemento_dotacion | type: TABLE --
-- DROP TABLE IF EXISTS public.elemento_dotacion CASCADE;
CREATE TABLE public.elemento_dotacion(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	abreviacion text,
	orden integer,
	activo boolean,
	id_tipo_elemento_dotacion integer,
	CONSTRAINT elemento_dotacion_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.elemento_dotacion IS 'El elemento de dotación pueden ser prendas de vestir, prendas de cuidado personal y otras que la empresa provea a sus trabajadores.';
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
	CONSTRAINT tipo_elemento_dotacion_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.tipo_elemento_dotacion IS 'Tipo de elemento de dotación, por ejemplo, elemento de cuidado personal, vestimenta obligatoria, etc.';
-- ddl-end --
ALTER TABLE public.tipo_elemento_dotacion OWNER TO postgres;
-- ddl-end --

-- object: elemento_dotacion_fk | type: CONSTRAINT --
-- ALTER TABLE public.entrega_elemento_dotacion DROP CONSTRAINT IF EXISTS elemento_dotacion_fk CASCADE;
ALTER TABLE public.entrega_elemento_dotacion ADD CONSTRAINT elemento_dotacion_fk FOREIGN KEY (id_elemento_dotacion)
REFERENCES public.elemento_dotacion (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.talla_dotacion DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.talla_dotacion ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
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
	tipo text,
	principal boolean,
	id_persona integer,
	id_entidad integer,
	CONSTRAINT cuenta_bancaria_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.cuenta_bancaria IS 'Cuenta bancaria de la persona, básicamente donde se le va a realizar la consignación de la plata.';
-- ddl-end --
COMMENT ON COLUMN public.cuenta_bancaria.tipo IS 'Pueden ir los textos en mayúsculas AHORROS o CORRIENTE, no se necesitan más, por eso no se hace otra tabla.';
-- ddl-end --
ALTER TABLE public.cuenta_bancaria OWNER TO postgres;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.cuenta_bancaria DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.cuenta_bancaria ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.relacion_persona_entidad | type: TABLE --
-- DROP TABLE IF EXISTS public.relacion_persona_entidad CASCADE;
CREATE TABLE public.relacion_persona_entidad(
	id serial NOT NULL,
	fecha_inicio date,
	fecha_fin date,
	id_persona integer,
	id_entidad integer,
	CONSTRAINT relacion_persona_entidad_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.relacion_persona_entidad IS 'Describe el tipo de relación que tiene una persona con una entidad, por ejemplo, una entidad bancaria, EPS, ARL, entre otros.';
-- ddl-end --
ALTER TABLE public.relacion_persona_entidad OWNER TO postgres;
-- ddl-end --

-- object: public.educacion_continuada | type: TABLE --
-- DROP TABLE IF EXISTS public.educacion_continuada CASCADE;
CREATE TABLE public.educacion_continuada(
	id serial NOT NULL,
	fecha_terminacion date,
	fecha_vencimiento date,
	id_persona integer,
	id_titulo_educacion_continuada integer,
	CONSTRAINT educacion_continuada_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.educacion_continuada IS 'Tabla para registrar diplomados o cursos de corta duración.';
-- ddl-end --
ALTER TABLE public.educacion_continuada OWNER TO postgres;
-- ddl-end --

-- object: elemento_dotacion_fk | type: CONSTRAINT --
-- ALTER TABLE public.talla_dotacion DROP CONSTRAINT IF EXISTS elemento_dotacion_fk CASCADE;
ALTER TABLE public.talla_dotacion ADD CONSTRAINT elemento_dotacion_fk FOREIGN KEY (id_elemento_dotacion)
REFERENCES public.elemento_dotacion (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: public.titulo_educacion_continuada | type: TABLE --
-- DROP TABLE IF EXISTS public.titulo_educacion_continuada CASCADE;
CREATE TABLE public.titulo_educacion_continuada(
	id serial NOT NULL,
	nombre text,
	descripcion text,
	horas integer,
	abreviacion text,
	orden integer,
	activo boolean,
	CONSTRAINT titulo_educacion_continuada_pk PRIMARY KEY (id)

);
-- ddl-end --
COMMENT ON TABLE public.titulo_educacion_continuada IS 'El título que se otorga en el diplomado, certificación.';
-- ddl-end --
ALTER TABLE public.titulo_educacion_continuada OWNER TO postgres;
-- ddl-end --

-- object: entidad_fk | type: CONSTRAINT --
-- ALTER TABLE public.cuenta_bancaria DROP CONSTRAINT IF EXISTS entidad_fk CASCADE;
ALTER TABLE public.cuenta_bancaria ADD CONSTRAINT entidad_fk FOREIGN KEY (id_entidad)
REFERENCES public.entidad (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: titulo_educacion_continuada_fk | type: CONSTRAINT --
-- ALTER TABLE public.educacion_continuada DROP CONSTRAINT IF EXISTS titulo_educacion_continuada_fk CASCADE;
ALTER TABLE public.educacion_continuada ADD CONSTRAINT titulo_educacion_continuada_fk FOREIGN KEY (id_titulo_educacion_continuada)
REFERENCES public.titulo_educacion_continuada (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.educacion_continuada DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.educacion_continuada ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_persona_entidad DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.relacion_persona_entidad ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: entidad_fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_persona_entidad DROP CONSTRAINT IF EXISTS entidad_fk CASCADE;
ALTER TABLE public.relacion_persona_entidad ADD CONSTRAINT entidad_fk FOREIGN KEY (id_entidad)
REFERENCES public.entidad (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: persona_fk | type: CONSTRAINT --
-- ALTER TABLE public.vivienda DROP CONSTRAINT IF EXISTS persona_fk CASCADE;
ALTER TABLE public.vivienda ADD CONSTRAINT persona_fk FOREIGN KEY (id_persona)
REFERENCES public.persona (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --

-- object: relacion_personas_id_persona1_fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS relacion_personas_id_persona1_fk CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT relacion_personas_id_persona1_fk FOREIGN KEY (id_persona1)
REFERENCES public.persona (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --

-- object: relacion_personas_id_persona2_fk | type: CONSTRAINT --
-- ALTER TABLE public.relacion_personas DROP CONSTRAINT IF EXISTS relacion_personas_id_persona2_fk CASCADE;
ALTER TABLE public.relacion_personas ADD CONSTRAINT relacion_personas_id_persona2_fk FOREIGN KEY (id_persona2)
REFERENCES public.persona (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


