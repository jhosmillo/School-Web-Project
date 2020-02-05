DROP DATABASE IF EXISTS `cis197_group_project_team2`;
SET default_storage_engine=InnoDB;
SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE DATABASE IF NOT EXISTS cis197_group_project_team2
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;
USE cis197_group_project_team2;

CREATE TABLE `user`(
username varchar(20) Not null,
pass varchar(20) not null,
displayname varchar(20) not null,
PRIMARY KEY (username)
);

CREATE TABLE `cimtuser`(
fk_username varchar(20) Not null,
phonenumber varchar(15) not null,
foreign key(fk_username) references user(username)
);

CREATE TABLE `rsc_provider`(
fk_username varchar(20) Not null,
postaladdress varchar(50) not null,
foreign key(fk_username) references user(username)
);

CREATE TABLE `administrator`(
fk_username varchar(20) Not null,
email varchar(50) not null,
foreign key(fk_username) references user(username)
);


CREATE TABLE `resource_function`(
pk_function int(10) unsigned not null auto_increment,
rsc_function varchar(20) Not null,
Primary Key (pk_function)
);

insert into `resource_function`(rsc_function)
values('Transportation'),('Communications'),('Engineering'),
		('Search and Rescue'),('Education'),('Energy'),
        ('Firefighting'),('Human Services');
        

CREATE TABLE `unit`(
unit_id int(2) unsigned not null auto_increment,
per_unit varchar(10),
PRIMARY KEY(unit_id)
);


CREATE TABLE `resources`(
resourcename varchar(20) not null,
resourceid int(16) unsigned not null auto_increment,
fk_pf int(10) unsigned null,
fk_sf int(10) unsigned null,
rsc_description varchar(250) null,
distance float(10) unsigned null,
fk_username varchar(20) not null,
PRIMARY KEY (resourceid),
foreign key(fk_username) references user(username) on delete cascade,
foreign key(fk_pf) references resource_function(pk_function),
foreign key(fk_sf) references resource_function(pk_function)

);
CREATE TABLE `capabilities`(
fk_cap int(10) unsigned not null,
cap_description varchar(250) null,
foreign key(fk_cap) references resources(resourceid) on delete cascade
);
CREATE TABLE `cost`(
fk_resource int(2) unsigned not null,
cost_value float(10) not null,
per_unit int(2) unsigned null,
foreign key(fk_resource) references resources(resourceid) on delete cascade,
foreign key(per_unit) references unit(unit_id)
);
CREATE TABLE `category`(
category_id varchar(10) not null,
category_type varchar(30) not null,
PRIMARY KEY(category_id)
);

CREATE TABLE `incidents`(
incidentid varchar(16) not null,
fk_category varchar(10) not null,
incident_date date null,
inci_description varchar(250) null, 
fk_username varchar(20) not null,
PRIMARY KEY(incidentid),
foreign key(fk_category) references category(category_id),
foreign key(fk_username) references user(username) on delete cascade
);


insert into `category`(category_id,category_type)
values('C1','must evac, secure lockdown'),('C2','may evac, secure lockdown'),
('C3','no evac, limited lockdown'),('C4','no evac, no lockdown');

insert into `unit`(per_unit)
values('day'),('hour'),('use');

    

 insert into `user`(username,pass,displayname)
 values('admin','1234','jh-cert'),
 ('admin1','1234','jh-provider'),
 ('admin2','1234','jh-admin');
 
 insert into `cimtuser`(fk_username,phonenumber)
 values('admin','323-440-7350');

insert into `rsc_provider`(fk_username,postaladdress)
 values('admin1','128 N. Ave 64 Los Angeles, C.A. 90042');
 
 insert into `administrator`(fk_username,email)
 values('admin2','jhosmillo@go.pasadena.edu');

