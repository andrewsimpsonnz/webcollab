#!/bin/bash
#
# This script does backups of a MySQL database
#
# dump_mysql.sh <database user> <database name> <database password>
#

if [ "x$3" = "x" ]; then
  echo "Format: $0 <database user> <database name> <database password>"
  exit
fi

mysqldump -u $1 "--password=$3"  --opt $2 > `date +%a_%d_%m_%Y_database-backup.sql`
