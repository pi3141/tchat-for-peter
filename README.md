## SQL à lancer sur la base de données
create table messages (
id int auto_increment primary key,
pseudo varchar(100) not null,
message text not null,
creationDate datetime null,
status varchar(32) null,
replyTo int null,
constraint messages_messages_id_fk
foreign key (replyTo) references messages (id)
);

## données à modifier
dans data.php, remplacer :
- 'NAME_ADMIN' par votre pseudo admin
- 'PASSWORD_ADMIN' par votre mot de passe admin