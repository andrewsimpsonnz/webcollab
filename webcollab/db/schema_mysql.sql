
CREATE TABLE tasks (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent INT NOT NULL,
	name VARCHAR(255) NOT NULL,
	text TEXT,
	created DATETIME NOT NULL,
	edited DATETIME NOT NULL,
	owner INT NOT NULL,
	creator INT NOT NULL,
	finished_time DATETIME NOT NULL,
	projectid INT NOT NULL DEFAULT 0,
	deadline DATETIME NOT NULL,
	priority INT NOT NULL DEFAULT 2,
	status VARCHAR(20) NOT NULL DEFAULT 'created',
	taskgroupid INT NOT NULL,
	lastforumpost DATETIME NOT NULL,
	usergroupid INT NOT NULL,
	globalaccess VARCHAR(5) NOT NULL DEFAULT 't',
	lastfileupload DATETIME NOT NULL,
        INDEX (owner),
        INDEX (parent),
        INDEX (name(10)),
	INDEX (projectid),
        INDEX (taskgroupid),
        INDEX (deadline),
        INDEX (status)
);


CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(200) NOT NULL,
	fullname VARCHAR(200) NOT NULL,
	password VARCHAR(200) NOT NULL,
	email VARCHAR(200) NOT NULL,
	admin VARCHAR(5) NOT NULL DEFAULT 'f',
	deleted VARCHAR(5) NOT NULL DEFAULT 'f',
        INDEX (fullname(10))
);


CREATE TABLE usergroups (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(255),
        INDEX (name(10))
);

CREATE TABLE forum (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent INT NOT NULL,
	taskid INT NOT NULL,
	posted DATETIME NOT NULL,
	text TEXT,
	userid INT NOT NULL,
	usergroupid INT NOT NULL,
        INDEX (taskid),
        INDEX (posted)
);


CREATE TABLE logins (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	session_key VARCHAR(100) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	lastaccess DATETIME NOT NULL,
        INDEX (session_key, user_id )
);


CREATE TABLE seen (
	taskid INT NOT NULL,
	userid INT NOT NULL,
	time DATETIME NOT NULL,
	INDEX (taskid, userid)
);

CREATE TABLE taskgroups (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(255),
        INDEX (name(10))
);


CREATE TABLE contacts (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(100) NOT NULL,
	lastname VARCHAR(100) NOT NULL,
	company VARCHAR(100),
	tel_home VARCHAR(100),
	gsm VARCHAR(100),
	fax VARCHAR(100),
	tel_business VARCHAR(100),
	address VARCHAR(100),
	postal VARCHAR(100),
	city VARCHAR(100),
	notes VARCHAR(100),
	email VARCHAR(100),
	added_by INT NOT NULL,
	date DATETIME NOT NULL,
	user_id INT NOT NULL
);


CREATE TABLE contacts_tasks (
	contact_id INT,
	task_id INT
);


CREATE TABLE files (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        oid INT NOT NULL DEFAULT 0,
	filename VARCHAR(255),
	size BIGINT NOT NULL DEFAULT 0,
	description TEXT,
	uploaded DATETIME NOT NULL,
	uploader INT NOT NULL,
	mime VARCHAR(50),
	taskid INT NOT NULL,
	INDEX (taskid)
);


CREATE TABLE usergroups_users (
	usergroupid INT NOT NULL,
	userid INT NOT NULL,
	INDEX (userid, usergroupid)
);

CREATE TABLE maillist (
	email VARCHAR(200)
);

CREATE TABLE config (
	email_admin VARCHAR(200),
	reply_to VARCHAR(200),
	email_from VARCHAR(200),
	globalaccess VARCHAR(50),
	owner VARCHAR(200),
	usergroup VARCHAR(200)
);

INSERT INTO users ( id, name, fullname, password, email, admin, deleted )
VALUES( 1, 'admin', 'Administrator', '0192023a7bbd73250516f069df18b500', 'please_edit@my_domain.com', 't', 'f' );

INSERT INTO config ( globalaccess )
VALUES( 'checked' );
