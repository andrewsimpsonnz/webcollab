#!/bin/bash
#
# This script does backups of a PostgreSQL database
#
# dump_postgresql.sh <database name>
#

if [ "x$1" = "x" ]; then
  echo "Format: $0 <database name>"
  exit
fi

pg_dump -u -f `date +%a_%d_%m_%Y_database-backup.sql` $1
