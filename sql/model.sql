CREATE USER 'login'@'localhost' IDENTIFIED BY '1234';
GRANT ALL ON login.* TO 'login'@'localhost';

create database login;
use login;
 
create table user (
	uid int not null auto_increment,
    username varchar(100) not null,
    password varbinary(100) not null,
    isdeactivated boolean default '0',
    primary key (uid)
);

insert into user (username, password) values ("user", "$2y$10$xjfIqbcgqOp9J0gh6CLKZuuuvaEfcAtJM3E5MMeVfz0I7SzywKVmO");
