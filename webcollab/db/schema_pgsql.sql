
CREATE SEQUENCE "tasks_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "tasks" (
	"id" integer DEFAULT nextval('"tasks_id_seq"'::text) NOT NULL,
	"parent" integer NOT NULL,
	"name" character varying(255) NOT NULL,
	"text" text,
	"created" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"edited" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"owner" integer NOT NULL,
	"creator" integer NOT NULL,
	"finished_time" timestamp with time zone NOT NULL,
	"projectid" integer NOT NULL,
	"deadline" timestamp with time zone NOT NULL,
	"priority" integer DEFAULT 2::int NOT NULL,
	"status" character varying(20) NOT NULL DEFAULT 'created',
	"taskgroupid" integer NOT NULL,
	"lastforumpost" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"usergroupid" integer NOT NULL,
	"globalaccess" boolean NOT NULL DEFAULT 't',
	"groupaccess" boolean NOT NULL DEFAULT 'f',
	"lastfileupload" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	Constraint "tasks_pkey" Primary Key ("id")
);
CREATE INDEX tasks_owner_idx ON tasks USING btree ("owner");
CREATE INDEX tasks_parent_idx ON tasks USING btree (parent);
CREATE INDEX tasks_name_idx ON tasks USING btree (name);
CREATE INDEX tasks_projectid_idx ON tasks USING btree (projectid);
CREATE INDEX tasks_taskgroupid_idx ON tasks USING btree (taskgroupid);
CREATE INDEX tasks_deadline_idx ON tasks USING btree (deadline);
CREATE INDEX tasks_status_idx ON tasks USING btree (status);


CREATE SEQUENCE "users_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "users" (
	"id" integer DEFAULT nextval('"users_id_seq"'::text) NOT NULL,
	"name" character varying(200) NOT NULL,
	"fullname" character varying(200) NOT NULL,
	"password" character varying(200) NOT NULL,
	"email" character varying(200) NOT NULL,
	"admin" boolean NOT NULL DEFAULT 'f'::bool,
	"private" integer DEFAULT 0::int NOT NULL,
	"deleted" boolean NOT NULL DEFAULT 'f'::bool,
	Constraint "users_pkey" Primary Key ("id")
);
CREATE INDEX users_fullname_idx ON users USING btree (fullname);


CREATE SEQUENCE "usergroups_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "usergroups" (
	"id" integer DEFAULT nextval('"usergroups_id_seq"'::text) NOT NULL,
	"name" character varying(100) NOT NULL,
	"description" character varying(255),
	"private" integer DEFAULT 0::int NOT NULL,
	Constraint "usergroups_pkey" Primary Key ("id")
);
CREATE INDEX usergroups_name_idx ON usergroups USING btree (name);


CREATE SEQUENCE "forum_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "forum" (
	"id" integer DEFAULT nextval('"forum_id_seq"'::text) NOT NULL,
	"parent" integer NOT NULL,
	"taskid" integer NOT NULL,
	"posted" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"text" text,
	"userid" integer NOT NULL,
	"usergroupid" integer NOT NULL,
	Constraint "forum_pkey" Primary Key ("id")
);
CREATE INDEX forum_taskid_idx ON forum USING btree (taskid);
CREATE INDEX forum_posted_idx ON forum USING btree (posted);


CREATE SEQUENCE "logins_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "logins" (
	"id" integer DEFAULT nextval('"logins_id_seq"'::text) NOT NULL,
	"user_id" integer NOT NULL,
	"session_key" character varying(100) NOT NULL,
	"ip" character varying(100) NOT NULL,
	"lastaccess" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	Constraint "logins_pkey" Primary Key ("id")
);
CREATE INDEX logins_session_key_idx ON logins USING btree (session_key);
CREATE INDEX logins_user_id_session_key_idx ON logins USING btree (session_key, user_id);


CREATE TABLE "seen" (
	"taskid" integer NOT NULL,
	"userid" integer NOT NULL,
	"time" timestamp with time zone,
	Constraint "seen_pkey" Primary Key ("taskid", "userid" )
);


CREATE SEQUENCE "taskgroups_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "taskgroups" (
	"id" integer DEFAULT nextval('"taskgroups_id_seq"'::text) NOT NULL,
	"name" character varying(100) NOT NULL,
	"description" character varying(255),
	Constraint "taskgroups_pkey" Primary Key ("id")
);
CREATE INDEX taskgroups_name_idx ON taskgroups USING btree (name);


CREATE SEQUENCE "contacts_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "contacts" (
	"id" integer DEFAULT nextval('"contacts_id_seq"'::text) NOT NULL,
	"firstname" character varying(100) NOT NULL,
	"lastname" character varying(100) NOT NULL,
	"company" character varying(100),
	"tel_home" character varying(100),
	"gsm" character varying(100),
	"fax" character varying(100),
	"tel_business" character varying(100),
	"address" character varying(100),
	"postal" character varying(100),
	"city" character varying(100),
	"notes" character varying(100),
	"email" character varying(100),
	"added_by" integer NOT NULL,
	"date" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"user_id" integer NOT NULL,
	Constraint "contacts_pkey" Primary Key ("id")
);


CREATE TABLE "contacts_tasks" (
	"contact_id" integer,
	"task_id" integer,
	Constraint "contacts_tasks_pkey" Primary Key ("contact_id", "task_id")
);


CREATE SEQUENCE "files_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "files" (
	"id" integer DEFAULT nextval('"files_id_seq"'::text) NOT NULL,
	"filename" character varying(255),
	"size" bigint NOT NULL DEFAULT 0,
	"description" text,
	"uploaded" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"uploader" integer NOT NULL,
	"mime" character varying(50),
	"taskid" integer NOT NULL,
	Constraint "files_pkey" Primary Key ("id")
);
CREATE INDEX files_name_idx ON files USING btree (taskid);

CREATE TABLE "usergroups_users" (
	"usergroupid" integer NOT NULL,
	"userid" integer NOT NULL,
	Constraint "usergroups_users_pkey" Primary Key ("userid", "usergroupid")
);

CREATE TABLE "maillist" (
	"email" character varying(200)
);

CREATE TABLE "config" (
	"email_admin" character varying(200),
	"reply_to" character varying(200),
	"email_from" character varying(200),
	"globalaccess" character varying(200),
	"groupaccess" character varying(200),
	"owner" character varying(200),
	"usergroup" character varying(200)
);

CREATE TABLE "login_attempt" (
	"name" character varying(100) NOT NULL,
	"ip" character varying(100) NOT NULL,
	"last_attempt" timestamp with time zone NOT NULL DEFAULT current_timestamp(0)
);

INSERT INTO users ( name, fullname, password, email, admin, deleted )
VALUES( 'admin', 'Administrator', '0192023a7bbd73250516f069df18b500', 'please_edit@my_domain.com', 't', 'f' );

INSERT INTO config ( globalaccess, groupaccess )
VALUES( 'checked', '' );