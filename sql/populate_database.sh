#!/bin/bash -ex
# link: http://blog.kablamo.org/2015/11/08/bash-tricks-eux/
echo 'Ejecutando: populate_database.sh'

SQL_INSIDE_DB=/sql/ddl.sql

# rationale: set a default sudo
if [ -z "$SUDO" ]; then
  SUDO=''
fi

# rationale: if table not exists, execute populations, if not have error, the query was successfull
SQLResult=$(echo "SELECT * FROM ${DATABSE_TEST_TABLE} LIMIT 0;" | $SUDO psql  -p ${DATABASE_PORT} -U postgres -d ${DATABASE_NAME} 2>&1) # error and output to variable
if ! echo "$SQLResult" | grep 'ERROR' &>/dev/null
then
  echo 'La tabla parametro ya está creada. Nada que hacer.'
elif echo $(echo "\connect ${DATABASE_NAME};" | $SUDO psql -p ${DATABASE_PORT} -U postgres 2>&1) | grep 'ERROR' &>/dev/null
then
  echo 'La base de datos ya está creada. Nada que hacer.'
else
tmp_file_inside_db=/tmp/sql_inside_db.sql
cp "$SQL_INSIDE_DB" "$tmp_file_inside_db"
$SUDO chown postgres:postgres "$tmp_file_inside_db"
$SUDO su postgres -c "
cd /tmp
psql -p ${DATABASE_PORT} -f ${tmp_file_inside_db} -d ${DATABASE_NAME}
"
fi
