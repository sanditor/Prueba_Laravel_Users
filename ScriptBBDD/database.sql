-- //crear una nueva base de datos
Drop DATABASE Prueba_Laravel;
CREATE DATABASE IF NOT EXISTS; Prueba_Laravel;
USE Prueba_Laravel;

CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
role            varchar(20),
name            varchar(100),
username        varchar(200),
email           varchar(120),
city          varchar(255),
hobbies         varchar(255),
password        varchar(255),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS hobbies(
id              int(255) auto_increment not null,
user_id         int(255),
name      varchar(255),
description     text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_hobbies PRIMARY KEY(id),
CONSTRAINT fk_hobbies_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;
