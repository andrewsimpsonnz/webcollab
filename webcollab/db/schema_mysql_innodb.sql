
CREATE TABLE tasks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent INT UNSIGNED NOT NULL,
	name VARCHAR(255) NOT NULL,
	text TEXT,
	created DATETIME NOT NULL,
	edited DATETIME NOT NULL,
	owner INT UNSIGNED NOT NULL,
	creator INT UNSIGNED NOT NULL,
	finished_time DATETIME NOT NULL,
	projectid INT UNSIGNED NOT NULL DEFAULT 0,
	deadline DATETIME NOT NULL,
	priority TINYINT NOT NULL DEFAULT 2,
	status VARCHAR(20) NOT NULL DEFAULT 'created',
	taskgroupid INT UNSIGNED NOT NULL,
	lastforumpost DATETIME NOT NULL,
	usergroupid INT UNSIGNED NOT NULL,
	globalaccess VARCHAR(5) NOT NULL DEFAULT 't',
	groupaccess VARCHAR(5) NOT NULL DEFAULT 'f',
	lastfileupload DATETIME NOT NULL,
        completed TINYINT NOT NULL DEFAULT 0,
        completion_time DATETIME NOT NULL,
        INDEX (owner),
        INDEX (parent),
        INDEX (name(10)),
        INDEX (projectid),
        INDEX (taskgroupid),
        INDEX (deadline),
        INDEX (status)
)
TYPE = InnoDB;


CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(200) NOT NULL,
	fullname VARCHAR(200) NOT NULL,
	password VARCHAR(200) NOT NULL,
	email VARCHAR(200) NOT NULL,
	admin VARCHAR(5) NOT NULL DEFAULT 'f',
	private TINYINT NOT NULL DEFAULT 0,
	deleted VARCHAR(5) NOT NULL DEFAULT 'f',
        INDEX (fullname(10))
)
TYPE = InnoDB;

CREATE TABLE usergroups (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(255),
	private TINYINT NOT NULL DEFAULT 0,
	INDEX (name(10))
)
TYPE = InnoDB;

CREATE TABLE forum (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent INT UNSIGNED NOT NULL,
	taskid INT UNSIGNED NOT NULL,
	posted DATETIME NOT NULL,
	text TEXT,
	userid INT UNSIGNED NOT NULL,
	usergroupid INT UNSIGNED NOT NULL,
        INDEX (taskid),
        INDEX (posted)
)
TYPE = InnoDB;

CREATE TABLE logins (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED NOT NULL,
	session_key VARCHAR(100) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	lastaccess DATETIME NOT NULL,
        INDEX (session_key(35), user_id )
)
TYPE = InnoDB;


CREATE TABLE seen (
	taskid INT UNSIGNED NOT NULL,
	userid INT UNSIGNED NOT NULL,
	time DATETIME NOT NULL,
	INDEX (taskid, userid)
)
TYPE = InnoDB;

CREATE TABLE taskgroups (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(255),
        INDEX (name(10))
)
TYPE = InnoDB;

CREATE TABLE contacts (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
	added_by INT UNSIGNED NOT NULL,
	date DATETIME NOT NULL,
	user_id INT UNSIGNED NOT NULL
)
TYPE = InnoDB;

CREATE TABLE contacts_tasks (
	contact_id INT,
	task_id INT
)
TYPE = InnoDB;

CREATE TABLE files (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        oid INT UNSIGNED NOT NULL DEFAULT 0,
	filename VARCHAR(255),
	size BIGINT NOT NULL DEFAULT 0,
	description TEXT,
	uploaded DATETIME NOT NULL,
	uploader INT UNSIGNED NOT NULL,
	mime VARCHAR(50),
	taskid INT UNSIGNED NOT NULL,
	INDEX (taskid)
)
TYPE = InnoDB;

CREATE TABLE usergroups_users (
	usergroupid INT UNSIGNED NOT NULL,
	userid INT UNSIGNED NOT NULL,
	INDEX (userid, usergroupid)
)
TYPE = InnoDB;

CREATE TABLE maillist (
	email VARCHAR(200)
)
TYPE = InnoDB;

CREATE TABLE config (
	email_admin VARCHAR(200),
	reply_to VARCHAR(200),
	email_from VARCHAR(200),
	globalaccess VARCHAR(50),
	groupaccess VARCHAR(50),
	owner VARCHAR(200),
	usergroup VARCHAR(200)
)
TYPE = InnoDB;


CREATE TABLE login_attempt ( 
	name VARCHAR(100) NOT NULL,                                               
	ip VARCHAR(100) NOT NULL,
	last_attempt DATETIME NOT NULL
)
TYPE = InnoDB;

INSERT INTO users ( id, name, fullname, password, email, admin, deleted )
VALUES( 1, 'admin', 'Administrator', '0192023a7bbd73250516f069df18b500', 'please_edit@my_domain.com', 't', 'f' );

INSERT INTO config ( globalaccess, groupaccess )
VALUES( 'checked', '' );
