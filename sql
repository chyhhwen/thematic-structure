drop database if exists mqtt;
create database mqtt default character set utf8 collate utf8_general_ci;
grant all on mqtt. * to'staff' @'localhost' identified by 'password';
use mqtt;

CREATE TABLE list
(
     id int AUTO_INCREMENT PRIMARY KEY,
     dispatch varchar(255) not null,
     target varchar(255) not null,
     data varchar(255) not null,
     time varchar(255) not null
);

CREATE TABLE block
(
    id int AUTO_INCREMENT PRIMARY KEY,
    ip varchar(255) not null,
    time varchar(255) not null
);
