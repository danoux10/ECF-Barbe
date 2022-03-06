create database ecf;

use ecf;

create table users(
    id int(11) primary key auto_increment,
    firstname varchar(255) not null ,
    lastname  varchar(255) not null ,
    username varchar(255)  not null ,
    email varchar(255)  not null ,
    pass varchar(255)   not null ,
    adress varchar(255) not null ,
    birth date  not null ,
    lvl varchar(255)  not null ,
    statu boolean not null
);

create table emprunt(
    id_loan int(11) primary key auto_increment,
    book int(11),
    user int(11),
    demand date,
    endDemand date,
    loan date,
    endLoan date
);


create table book(
    id int(11) primary key auto_increment,
    title varchar(255),
    author varchar(255),
    cover varchar(255),
    style varchar(255),
    info text(255),
    parution date,
    statu boolean
);

create table genre(
    id_genre int(11) primary key auto_increment,
    nom varchar(255) not null
);

create table niveaux(
    id int(11) primary key  auto_increment,
    nom varchar(255) not null
)

insert into niveaux (nom) value ('admin');
insert into niveaux (nom) value ('employer');
insert into niveaux (nom) value ('user');

insert into users (firstname, lastname, username, email, pass, adress, birth, lvl, statu) VALUE ('admin', 'admin', 'admin   admin','admin@admin.admin', '$2y$10$75b4HdDZBd.fkU.fTMKO.uNqmZI6.YxudvVImABNVL9lQJwxl3LDi', '1 rue de l''admin', '2001-01-01','1','0');
insert into users (firstname, lastname, username, email, pass, adress, birth, lvl, statu) VALUE ('employer', 'employer', 'employer   employer','employer@employer.employer', '$2y$10$pCXmOV01LZTr98kaqfUzP.tQu0wtcWlOlRgGwz5mdu88K5wl4rS76', '1 rue de l''employer', '2001-01-01','2','0');
insert into users (firstname, lastname, username, email, pass, adress, birth, lvl, statu) VALUE ('user', 'user', 'user   user','user@user.user', '$2y$10$nLWczLPc8dYfjKXFrixoN.Ns6Py9hTOYaHy1JoZfCmI44/OFiVmOq', '1 rue de l''utilisateur', '2001-01-01','3','0');


