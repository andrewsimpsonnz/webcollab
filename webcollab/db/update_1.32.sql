/*
This script works with either PostgreSQL or MySQL.

Usage:

PostgreSQL
 psql -U 'database_user' -e 'database_name' < update_1.32.sql

MySQL
 mysql 'database_name' -u 'database_user' -p < update_1.32.sql

Alternatively the three commands below can be entered manually at the
database shell command prompt.
*/

ALTER TABLE tasks ADD COLUMN groupaccess VARCHAR(5);
ALTER TABLE tasks ALTER COLUMN groupaccess SET DEFAULT 'f';
ALTER TABLE config ADD COLUMN groupaccess VARCHAR(50);
