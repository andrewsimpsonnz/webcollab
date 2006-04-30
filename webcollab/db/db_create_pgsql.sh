#!/bin/bash

if [ "x$2" = "x" ]; then
  echo "Format: $0 <database user> <database name>"
  exit
fi

#
# CREATION SCRIPT STARTS
#

# does the database already exist ?
DB_EXISTS=`echo "" | psql -U $1 $2 &> /dev/null && echo "1" || echo "0"`
if [ $DB_EXISTS = "1" ]; then
  echo "The selected database already exists"
  echo "No databases created"
  echo "Exit 1"
  exit
fi

# create the database
createdb -U $1 -E UTF8 $2

#insert the structure and data
psql -U $1 $2 < ./schema_pgsql.sql

# optimise and prepare for work
echo "VACUUM;" | psql -U $1 $2 &> /dev/null
echo "ANALYZE;" | psql -U $1 $2 &> /dev/null

# all done!
echo "Database completion is complete!"

