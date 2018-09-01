
CREATE TABLE tasks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent INT UNSIGNED NOT NULL,
	task_name VARCHAR(255) NOT NULL,
	task_text TEXT,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	edited TIMESTAMP NOT NULL DEFAULT 0,
	task_owner INT UNSIGNED NOT NULL DEFAULT 0,
	creator INT UNSIGNED NOT NULL,
	finished_time TIMESTAMP NOT NULL DEFAULT 0,
	projectid INT UNSIGNED NOT NULL DEFAULT 0,
	deadline TIMESTAMP NOT NULL DEFAULT 0,
	priority TINYINT NOT NULL DEFAULT 2,
	task_status VARCHAR(20) NOT NULL DEFAULT 'created',
	taskgroupid INT UNSIGNED NOT NULL,
	lastforumpost TIMESTAMP NOT NULL DEFAULT 0,
	usergroupid INT UNSIGNED NOT NULL,
	globalaccess VARCHAR(5) NOT NULL DEFAULT 't',
	groupaccess VARCHAR(5) NOT NULL DEFAULT 'f',
	lastfileupload TIMESTAMP NOT NULL DEFAULT 0,
	completed TINYINT NOT NULL DEFAULT 0,
	completion_time TIMESTAMP NOT NULL DEFAULT 0,
	archive TINYINT NOT NULL DEFAULT 0,
	sequence INT UNSIGNED NOT NULL DEFAULT 0,
	INDEX (task_owner),
	INDEX (parent),
	INDEX (task_name(10)),
	INDEX (projectid),
	INDEX (taskgroupid),
	INDEX (deadline),
	INDEX (task_status, parent)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_name VARCHAR(200) NOT NULL,
	fullname VARCHAR(200) NOT NULL,
	user_password VARCHAR(255) NOT NULL,
	email VARCHAR(200) NOT NULL,
	user_admin VARCHAR(5) NOT NULL DEFAULT 'f',
	private TINYINT NOT NULL DEFAULT 0,
	guest TINYINT NOT NULL DEFAULT 0,
	deleted VARCHAR(5) NOT NULL DEFAULT 'f',
	locale VARCHAR(10) NOT NULL DEFAULT 'en',
  INDEX (fullname(10))
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE usergroups (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	group_name VARCHAR(100) NOT NULL,
	group_description VARCHAR(255),
	private TINYINT NOT NULL DEFAULT 0,
	INDEX (group_name(10))
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE forum (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	parent INT UNSIGNED NOT NULL,
	taskid INT UNSIGNED NOT NULL,
	posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	edited TIMESTAMP NOT NULL DEFAULT 0,
	forum_text TEXT,
	userid INT UNSIGNED NOT NULL,
	usergroupid INT UNSIGNED NOT NULL,
	sequence INT UNSIGNED NOT NULL DEFAULT 0,
	INDEX (taskid),
	INDEX (edited)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE logins (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED NOT NULL,
	session_key VARCHAR(100) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	lastaccess TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  token VARCHAR(100),
	INDEX (session_key(10), user_id ),
  INDEX (lastaccess)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE seen (
	taskid INT UNSIGNED NOT NULL,
	userid INT UNSIGNED NOT NULL,
	seen_time TIMESTAMP NOT NULL DEFAULT 0,
	INDEX (taskid, userid)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE taskgroups (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	group_name VARCHAR(100) NOT NULL,
	group_description VARCHAR(255),
	INDEX (group_name(10))
)
ENGINE = InnoDB
CHARACTER SET = utf8;

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
	notes TEXT,
	email VARCHAR(100),
	added_by INT UNSIGNED NOT NULL,
	date_mod TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	user_id INT UNSIGNED NOT NULL,
        taskid INT UNSIGNED NOT NULL DEFAULT 0
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE contacts_tasks (
	contact_id INT,
	task_id INT
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE files (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fileid INT UNSIGNED NOT NULL DEFAULT 0,
	hashid VARCHAR(200),
	filename VARCHAR(255),
	file_size BIGINT NOT NULL DEFAULT 0,
	file_description TEXT,
	uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	uploader INT UNSIGNED NOT NULL,
	mime VARCHAR(200),
	taskid INT UNSIGNED NOT NULL,
	INDEX (taskid)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE usergroups_users (
	usergroupid INT UNSIGNED NOT NULL,
	userid INT UNSIGNED NOT NULL,
	INDEX (userid, usergroupid)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE maillist (
	email VARCHAR(200)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE config (
	email_admin VARCHAR(200),
	reply_to VARCHAR(200),
	email_from VARCHAR(200),
	globalaccess VARCHAR(50),
	groupaccess VARCHAR(50),
	config_owner VARCHAR(50),
	usergroup VARCHAR(50),
	project_order VARCHAR(200),
	task_order VARCHAR(200)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE login_attempt ( 
	login_name VARCHAR(100) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	last_attempt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE site_name (
	manager_name VARCHAR(100),
	abbr_manager_name VARCHAR(100)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

CREATE TABLE tokens (
  token VARCHAR(100),
  user_action VARCHAR(100),
  userid INT UNSIGNED NOT NULL,
  lastaccess TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (token)
)
ENGINE = InnoDB
CHARACTER SET = utf8;

INSERT INTO users ( id, user_name, fullname, user_password, email, user_admin, deleted )
VALUES( 1, 'admin', 'Administrator', '0192023a7bbd73250516f069df18b500', 'please_edit@my_domain.com', 't', 'f' );

INSERT INTO config ( globalaccess, groupaccess, project_order, task_order )
VALUES( 'checked=\"checked\"', '', 'ORDER BY task_name', 'ORDER BY task_name' );

INSERT INTO site_name ( manager_name, abbr_manager_name )
VALUES( 'WebCollab Project Management', 'WebCollab' );
