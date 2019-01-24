# hrm
Human resource management (HRM or HR)

# Database conventions
- Tables:
The table names must be in lower case separeted with underscore "_" and in singular mode for example:
person
type
user_type
tipo_usuario
tipo_relacion
examen_medico
tipo_examen_medico

Only have an exception, if the sense of the entity changes, for example:
use tipo_relacion_personas insted of tipo_relacion_persona, this is because the relation is between personas and not only one persona.
use dogs_relation insted of dog_relation, this is because the relation is between 2 or more dogs, not only one.

- Constraints:
These should be named as:

Primary key:
table_name__field_name__pk
nombre_tabla__nombre_campo__pk
persona_id_pk

Foraign key:
main_table_name__referenced_table__field_name__fk

Unique key:
__uq

------
The standard names for indexes in PostgreSQL are:

{tablename}_{columnname(s)}_{suffix}

where the suffix is one of the following:

    pkey for a Primary Key constraint
    key for a Unique constraint
    excl for an Exclusion constraint
    idx for any other kind of index
    fkey for a Foreign key
    check for a Check constraint


nombre_tabla_nombre_tabla_referenciada_nombre_campo_fk para foraing key
constraints de relaciones uno a uno, muchos a muchos y uno a muchos
los campos de las tablas paramétricas

# Docker 
```sh
cp .env-example .env
./run
docker-compose exec app bash
```

# Symfony
```sh
composer create-project symfony/skeleton hrm
composer require symfony/web-server-bundle --dev
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
php bin/console doctrine:mapping:import 'App\Entity' annotation --path=src/Entity
php bin/console make:entity --regenerate App
php bin/console doctrine:query:sql 'SELECT * FROM persona'
php bin/console server:start 0.0.0.0:8000
php bin/console server:run 0.0.0.0:8000
# crear crud
composer require form validator twig-bundle security-csrf
php bin/console make:crud Otrosi
php bin/console make:crud Contrato
php bin/console make:crud TipoElementoDotacion
php bin/console make:crud TallaDotacion
php bin/console make:crud RegistroVacuna
php bin/console make:crud TipoRelacionPersonas
php bin/console make:crud RelacionPersonas
php bin/console make:crud Genero
php bin/console make:crud TipoContrato
php bin/console make:crud TipoProgramaExamenMedico
php bin/console make:crud TipoVacuna
php bin/console make:crud ElementoDotacion
php bin/console make:crud Vivienda
php bin/console make:crud ConceptoOtrosi
php bin/console make:crud RelacionPersonaEntidad
php bin/console make:crud Persona
php bin/console make:crud EstadoCivil
php bin/console make:crud TituloAcademico
php bin/console make:crud ProcesoGestionIntegral
php bin/console make:crud EntregaElementoDotacion
php bin/console make:crud Cargo
php bin/console make:crud EducacionBasicaMedia
php bin/console make:crud ProrrogaContrato
php bin/console make:crud TipoEntidad
php bin/console make:crud ExamenMedico
php bin/console make:crud TipoExamenMedico
php bin/console make:crud CuentaBancaria
php bin/console make:crud EducacionContinuada
php bin/console make:crud ConceptoExamenMedico
php bin/console make:crud TipoVivienda
php bin/console make:crud TituloEducacionContinuada
php bin/console make:crud EducacionSuperior
php bin/console make:crud Entidad
```