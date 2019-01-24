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
```

# Symfony
```sh
composer create-project symfony/skeleton hrm
composer require symfony/web-server-bundle --dev
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
php bin/console doctrine:mapping:import 'App\Entity' annotation --path=src/Entity
php bin/console doctrine:query:sql 'SELECT * FROM persona'
php bin/console server:start 0.0.0.0:8000
php bin/console server:run 0.0.0.0:8000
```