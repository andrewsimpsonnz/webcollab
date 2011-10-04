#!/bin/bash

if [ "x$3" = "x" ]; then
  echo "Format: $0 <database user> <database name> <password>"
  exit
fi

DB_EXISTS=`echo "" | mysql --user=$1 --password=$3 $2 &> /dev/null && echo "1" || echo "0"`
if [ $DB_EXISTS = "1" ]; then
  echo "The selected database name already exists"
  echo "No databases created"
  echo "Exit 1"
  exit
fi

# create the database (an error will be output if database already exists)
mysql -u$1 -p$3 -e"CREATE DATABASE $2 CHARACTER SET utf8;"

#insert the structure and data
mysql $2 -vvv -u$1 -p$3 < ./schema_mysql_innodb.sql

# all done!
echo "Database completion is completed"
echo "Login as admin \ admin123"
echo "Exit 0"

