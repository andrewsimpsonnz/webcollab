#!/bin/bash

if [ "x$1" = "x" ]; then
  echo "Format: $0 <database name>"
  exit
fi

pg_dump -u -f `date +%a_%d_%m_%Y_database-backup.sql` $1
