CREATE TABLE tx_jdavsv_domain_model_event (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	registration int(11) unsigned DEFAULT '0' NOT NULL,
	
	title varchar(255) DEFAULT '' NOT NULL,
	subtitle varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	date_start int(11) DEFAULT '0' NOT NULL,
	date_end int(11) DEFAULT '0' NOT NULL,
	duration double(11,2) DEFAULT '0.00' NOT NULL,
	place text NOT NULL,
	travelling text NOT NULL,
	accreditation_number varchar(255) DEFAULT '' NOT NULL,
	requirements text NOT NULL,
	contents text NOT NULL,
	education_objective text NOT NULL,
	first_teamer int(11) DEFAULT '0' NOT NULL,
	second_teamer int(11) DEFAULT '0' NOT NULL,
	event_year int(11) DEFAULT '0' NOT NULL,
	trainee int(11) DEFAULT '0' NOT NULL,
	kitchen_group int(11) DEFAULT '0' NOT NULL,
	price double(11,2) DEFAULT '0.00' NOT NULL,
	max_registrations int(11) DEFAULT '0' NOT NULL,
	min_registrations int(11) DEFAULT '0' NOT NULL,
	att_teamer_ratio varchar(255) DEFAULT '' NOT NULL,
	announcement text NOT NULL,
	comment text NOT NULL,
	tour_report_required tinyint(1) unsigned DEFAULT '0' NOT NULL,
	registration_deadline int(11) DEFAULT '0' NOT NULL,
	unregister_deadline int(11) DEFAULT '0' NOT NULL,
	registration_open_date int(11) DEFAULT '0' NOT NULL,
	accommodation int(11) unsigned DEFAULT '0' NOT NULL,
	catering int(11) unsigned DEFAULT '0' NOT NULL,
	fee int(11) unsigned DEFAULT '0' NOT NULL,
	category int(11) unsigned DEFAULT '0' NOT NULL,
	registrations int(11) unsigned DEFAULT '0',
  is_proposal  tinyint(1) unsigned DEFAULT '0' NOT NULL,
  teamer_input_finished tinyint(1) unsigned DEFAULT '0' NOT NULL,
  is_proofread tinyint(1) unsigned DEFAULT '0' NOT NULL,
  is_accepted tinyint(1) unsigned DEFAULT '0' NOT NULL,
  counts_in_max_registrations  tinyint(1) unsigned DEFAULT '0' NOT NULL,
  is_public  tinyint(1) unsigned DEFAULT '0' NOT NULL,
  archived tinyint(1) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_registration (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	date int(11) DEFAULT '0' NOT NULL,
	attendee int(11) DEFAULT '0' NOT NULL,
	reserved_until int(11) DEFAULT '0' NOT NULL,
	waiting_list tinyint(1) unsigned DEFAULT '0' NOT NULL,
	registration_order int(11) DEFAULT '0' NOT NULL,
	vegetarian tinyint(1) unsigned DEFAULT '0' NOT NULL,
	paid tinyint(1) unsigned DEFAULT '0' NOT NULL,
	registration_confirmation_sent tinyint(1) unsigned DEFAULT '0' NOT NULL,
	debit_information_sent tinyint(1) unsigned DEFAULT '0' NOT NULL,
	state int(11) unsigned DEFAULT '0' NOT NULL,
	payment_method int(11) unsigned DEFAULT '0' NOT NULL,
	event int(11) unsigned DEFAULT '0' NOT NULL,
    is_accepted tinyint(1) unsigned DEFAULT '0' NOT NULL,
    is_reservation tinyint(1) unsigned DEFAULT '0' NOT NULL,
    comment text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_category (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	event int(11) unsigned DEFAULT '0' NOT NULL,
	eventcategoryregistrationstate int(11) unsigned DEFAULT '0' NOT NULL,
	
	name varchar(255) DEFAULT '' NOT NULL,
	tour_report_required tinyint(1) unsigned DEFAULT '0' NOT NULL,
    shortcut varchar(255) DEFAULT '' NOT NULL,
    prerequisites int(11) DEFAULT '0' NOT NULL,
	announcement text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_sektion (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	address  text NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	vorstand int(11) DEFAULT 0 NOT NULL,
	jugendreferent int(11) DEFAULT 0 NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_eventstate (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	event int(11) unsigned DEFAULT '0' NOT NULL,
	
	name varchar(255) DEFAULT '' NOT NULL,
	tx_jdavsv_order varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_eventcategoryregistrationstate (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	
	category int(11) unsigned DEFAULT '0' NOT NULL,
	state int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_registrationstate (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	registration int(11) unsigned DEFAULT '0' NOT NULL,
	eventcategoryregistrationstate int(11) unsigned DEFAULT '0' NOT NULL,
	
	name varchar(255) DEFAULT '' NOT NULL,
	is_required tinyint(1) unsigned DEFAULT '0' NOT NULL,
	is_external tinyint(1) unsigned DEFAULT '0' NOT NULL,
	is_internal tinyint(1) unsigned DEFAULT '0' NOT NULL,
	prerequisites int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_accommodation (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	event int(11) unsigned DEFAULT '0' NOT NULL,
	
	name varchar(255) DEFAULT '' NOT NULL,
	address text NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	telephone varchar(255) DEFAULT '' NOT NULL,
	notes text NOT NULL,
	google_maps_code text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_eventfee (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	event int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	price_per_day double(11,2) DEFAULT '0.00' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_eventyear (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_jdavsv_domain_model_categoryprerequisitefulfillment (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l18n_parent int(11) DEFAULT '0' NOT NULL,
    l18n_diffsource mediumblob NOT NULL,
    t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

    registration int(11) DEFAULT '0' NOT NULL,
    prerequisite  tinyint(4) unsigned DEFAULT '0' NOT NULL,
    is_fulfilled  tinyint(4) unsigned DEFAULT '0' NOT NULL,
    annotation text NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY registration (registration),
    KEY prequisite (prerequisite)
);

CREATE TABLE tx_jdavsv_domain_model_categoryprerequisite (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l18n_parent int(11) DEFAULT '0' NOT NULL,
    l18n_diffsource mediumblob NOT NULL,
    t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

    category int(11) DEFAULT '0' NOT NULL,
    required tinyint(4) unsigned DEFAULT '0' NOT NULL,
    internal tinyint(4) unsigned DEFAULT '0' NOT NULL,
    shortcut varchar(255) DEFAULT '' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    description text NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY category (category)
);

CREATE TABLE fe_users (
    tx_jdavsv_sektion int(11) DEFAULT '0' NOT NULL,
    tx_jdavsv_dav_nr varchar(255) DEFAULT '' NOT NULL,
    tx_jdavsv_julei_nr varchar(255) DEFAULT '' NOT NULL,
    tx_jdavsv_sex varchar(255) DEFAULT '' NOT NULL,
    tx_jdavsv_is_teamer tinyint(4) unsigned DEFAULT '0' NOT NULL,
    tx_jdavsv_is_trainee tinyint(4) unsigned DEFAULT '0' NOT NULL,
    tx_jdavsv_is_kitchen_group tinyint(4) unsigned DEFAULT '0' NOT NULL,
    tx_jdavsv_is_admin tinyint(4) unsigned DEFAULT '0' NOT NULL,
    tx_jdavsv_is_proofreader tinyint(4) unsigned DEFAULT '0' NOT NULL,
    tx_jdavsv_mobile_phone varchar(30) DEFAULT '' NOT NULL,
    tx_jdavsv_comment text NOT NULL,
    tx_jdavsv_forgotpasswordhash text NOT NULL,

    tx_jdavmv_mtgldnr_sektion tinytext,
	  tx_jdavmv_mtgldnr_ortsgruppe tinytext,
	  tx_jdavmv_mtgldnr_mtgldnr tinytext,

    KEY sektion (sektion)
);
