create database login;
use login;

create table user (
	uid int not null auto_increment,
    username varchar(100) not null,
    password varbinary(100) not null,
    isdeactivated boolean default '0',
    primary key (uid)
);

select isdeactivated from user where username = "" and password = "";

insert into user (username, password) values ("user", "$2y$10$xjfIqbcgqOp9J0gh6CLKZuuuvaEfcAtJM3E5MMeVfz0I7SzywKVmO");

update user set password = "$2y$10$xjfIqbcgqOp9J0gh6CLKZuuuvaEfcAtJM3E5MMeVfz0I7SzywKVmO" where user = "user";

delete from user where user = "user";
ALTER TABLE user AUTO_INCREMENT = 1;

select * from user;

select isdeactivated, password from user where username = "user";

select password, isdeactivated from user where username = "user";