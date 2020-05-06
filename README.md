create table messages (
id int auto_increment primary key,
pseudo varchar(100) not null,
message text not null,
creationDate datetime null
);