#!/bin/bash

if [ "x$3" = "x" ]; then
  echo "Format: $0 <database user> <database name> <password>"
  exit
fi

# create the database (an error will be output if database already exists)
mysql -u$1 -p$3 -e"CREATE DATABASE $2;"

#insert the structure and data
mysql $2 -vvv -u$1 -p$3 < ./schema_mysql.sql

# all done!
echo "Database completion is complete!"

