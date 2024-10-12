-- Active: 1725534490612@@127.0.0.1@3306@todolist
CREATE DATABASE  todolist;
USE todolist;

CREATE TABLE  `todo` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `title` varchar(2048) NOT NULL,
    `done` tinyint(1) NOT NULL DEFAULT '0',
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
