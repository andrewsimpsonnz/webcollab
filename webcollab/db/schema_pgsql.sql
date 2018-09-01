
CREATE SEQUENCE "tasks_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "tasks" (
	"id" integer DEFAULT nextval('"tasks_id_seq"'::text) NOT NULL,
	"parent" integer NOT NULL,
	"task_name" character varying(255) NOT NULL,
	"task_text" text,
	"created" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"edited" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"task_owner" integer NOT NULL,
	"creator" integer NOT NULL,
	"finished_time" timestamp with time zone NOT NULL,
	"projectid" integer NOT NULL,
	"deadline" timestamp with time zone NOT NULL,
	"priority" integer DEFAULT 2::int NOT NULL,
	"task_status" character varying(20) NOT NULL DEFAULT 'created',
	"taskgroupid" integer NOT NULL,
	"lastforumpost" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"usergroupid" integer NOT NULL,
	"globalaccess" character varying(5) NOT NULL DEFAULT 't'::text,
	"groupaccess" character varying(5) NOT NULL DEFAULT 'f'::text,
	"lastfileupload" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"completed" integer DEFAULT 0::int NOT NULL,
	"completion_time" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"archive" smallint DEFAULT 0::int NOT NULL,
	"sequence" integer DEFAULT 0::int NOT NULL,
	Constraint "tasks_pkey" Primary Key ("id")
);
CREATE INDEX tasks_owner_idx ON tasks USING btree ("task_owner");
CREATE INDEX tasks_parent_idx ON tasks USING btree (parent);
CREATE INDEX tasks_name_idx ON tasks USING btree (task_name);
CREATE INDEX tasks_projectid_idx ON tasks USING btree (projectid);
CREATE INDEX tasks_taskgroupid_idx ON tasks USING btree (taskgroupid);
CREATE INDEX tasks_deadline_idx ON tasks USING btree (deadline);
CREATE INDEX tasks_status_idx ON tasks USING btree (task_status, parent);


CREATE SEQUENCE "users_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "users" (
	"id" integer DEFAULT nextval('"users_id_seq"'::text) NOT NULL,
	"user_name" character varying(200) NOT NULL,
	"fullname" character varying(200) NOT NULL,
	"user_password" character varying(255) NOT NULL,
	"email" character varying(200) NOT NULL,
	"user_admin" character varying(5) NOT NULL DEFAULT 'f'::text,
	"private" smallint DEFAULT 0::int NOT NULL,
        "guest" smallint DEFAULT 0::int NOT NULL,
	"deleted" character varying(5) NOT NULL DEFAULT 'f'::text,
        "locale" character varying(10) DEFAULT 'en'::text NOT NULL,
	Constraint "users_pkey" Primary Key ("id")
);
CREATE INDEX users_fullname_idx ON users USING btree (fullname);


CREATE SEQUENCE "usergroups_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "usergroups" (
	"id" integer DEFAULT nextval('"usergroups_id_seq"'::text) NOT NULL,
	"group_name" character varying(100) NOT NULL,
	"group_description" character varying(255),
	"private" smallint DEFAULT 0::int NOT NULL,
	Constraint "usergroups_pkey" Primary Key ("id")
);
CREATE INDEX usergroups_name_idx ON usergroups USING btree (group_name);


CREATE SEQUENCE "forum_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "forum" (
	"id" integer DEFAULT nextval('"forum_id_seq"'::text) NOT NULL,
	"parent" integer NOT NULL,
	"taskid" integer NOT NULL,
	"posted" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"edited" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"forum_text" text,
	"userid" integer NOT NULL,
	"usergroupid" integer NOT NULL,
	"sequence" integer DEFAULT 0::int NOT NULL,
	Constraint "forum_pkey" Primary Key ("id")
);
CREATE INDEX forum_taskid_idx ON forum USING btree (taskid);
CREATE INDEX forum_edited_idx ON forum USING btree (edited);


CREATE SEQUENCE "logins_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "logins" (
	"id" integer DEFAULT nextval('"logins_id_seq"'::text) NOT NULL,
	"user_id" integer NOT NULL,
	"session_key" character varying(100) NOT NULL,
	"ip" character varying(100) NOT NULL,
	"lastaccess" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
        "token" character varying(100),
	Constraint "logins_pkey" Primary Key ("id")
);
CREATE INDEX logins_session_key_idx ON logins USING btree (session_key);
CREATE INDEX logins_user_id_session_key_idx ON logins USING btree (session_key, user_id);
CREATE INDEX logins_lastaccess_idx ON logins USING btree (lastaccess);


CREATE TABLE "seen" (
	"taskid" integer NOT NULL,
	"userid" integer NOT NULL,
	"seen_time" timestamp with time zone,
	Constraint "seen_pkey" Primary Key ("taskid", "userid" )
);


CREATE SEQUENCE "taskgroups_id_seq" start 1 increment 1 maxvalue 2147483647 minvalue 1 cache 1;
CREATE TABLE "taskgroups" (
	"id" integer DEFAULT nextval('"taskgroups_id_seq"'::text) NOT NULL,
	"group_name" character varying(100) NOT NULL,
	"group_description" character varying(255),
	Constraint "taskgroups_pkey" Primary Key ("id")
);
CREATE INDEX taskgroups_name_idx ON taskgroups USING btree (group_name);


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
	"notes" text,
	"email" character varying(100),
	"added_by" integer NOT NULL,
	"date_mod" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"user_id" integer NOT NULL,
	"taskid" integer DEFAULT 0::int NOT NULL,
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
	"fileid" integer NOT NULL DEFAULT 0::int,
	"hashid" character varying(200),
	"filename" character varying(255),
	"file_size" bigint NOT NULL DEFAULT 0::int,
	"file_description" text,
	"uploaded" timestamp with time zone NOT NULL DEFAULT current_timestamp(0),
	"uploader" integer NOT NULL,
	"mime" character varying(200),
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
	"config_owner" character varying(200),
	"usergroup" character varying(200),
	"project_order"  character varying(200),
	"task_order"  character varying(200)
);

CREATE TABLE "login_attempt" (
	"login_name" character varying(100) NOT NULL,
	"ip" character varying(100) NOT NULL,
	"last_attempt" timestamp with time zone NOT NULL DEFAULT current_timestamp(0)
);

CREATE TABLE "site_name" (
	"manager_name" character varying(100),
	"abbr_manager_name" character varying(100)
);

CREATE TABLE "tokens" (
        "token" character varying(100) NOT NULL,
        "user_action" character varying(100) NOT NULL,
        "userid" integer NOT NULL,
        "lastaccess" timestamp with time zone NOT NULL DEFAULT current_timestamp(0)
);
CREATE INDEX tokens_token_idx ON tokens USING btree ("token");

INSERT INTO users ( user_name, fullname, user_password, email, user_admin, deleted )
VALUES( 'admin', 'Administrator', '0192023a7bbd73250516f069df18b500', 'please_edit@my_domain.com', 't', 'f' );

INSERT INTO config ( globalaccess, groupaccess,  project_order, task_order )
VALUES( 'checked=\"checked\"', '', 'ORDER BY task_name', 'ORDER BY task_name' );

INSERT INTO site_name ( manager_name, abbr_manager_name )
VALUES( 'WebCollab Project Management', 'WebCollab' );
