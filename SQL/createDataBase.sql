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
