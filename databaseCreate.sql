CREATE DATABASE team01;
use team01;

CREATE TABLE theater_info(
theater_idx INT NOT NULL AUTO_INCREMENT,
theater_name VARCHAR(64),
theater_address VARCHAR(200),
PRIMARY KEY(theater_idx));

CREATE TABLE movie_genre(
genre_idx INT NOT NULL AUTO_INCREMENT,
genre VARCHAR(16),
PRIMARY KEY(genre_idx));

CREATE TABLE movie_info(
movie_idx INT NOT NULL AUTO_INCREMENT,
movie_title VARCHAR(64),
director VARCHAR(32),
main_actor VARCHAR(32),
genre_idx INT,
running_time INT,
filename VARCHAR(100),
imgurl VARCHAR(512),
PRIMARY KEY(movie_idx),
FOREIGN KEY(genre_idx) REFERENCES movie_genre(genre_idx),
INDEX movie_index(movie_idx));

CREATE TABLE movie_review(
movie_idx INT NOT NULL AUTO_INCREMENT,
movie_rating DOUBLE,
age INT,
gender VARCHAR(5),
PRIMARY KEY(movie_idx),
FOREIGN KEY(movie_idx) REFERENCES movie_info(movie_idx));

CREATE TABLE screen_info(
theater_idx INT NOT NULL AUTO_INCREMENT,
movie_idx INT NOT NULL,
PRIMARY KEY(theater_idx, movie_idx),
FOREIGN KEY(movie_idx) REFERENCES movie_info(movie_idx),
FOREIGN KEY(theater_idx) REFERENCES theater_info(theater_idx),
INDEX screen_info(theater_idx));

CREATE TABLE admin_info(
admin_idx INT NOT NULL AUTO_INCREMENT,
admin_id VARCHAR(10),
admin_pw VARCHAR(20),
theater_idx INT NOT NULL,
PRIMARY KEY(admin_idx),
FOREIGN KEY(theater_idx) REFERENCES theater_info(theater_idx));

CREATE TABLE menu_info(
theater_idx INT NOT NULL AUTO_INCREMENT,
menu_id VARCHAR(50) NOT NULL,
price INT,
description VARCHAR(200),
PRIMARY KEY(theater_idx, menu_id),
FOREIGN KEY(theater_idx) REFERENCES theater_info(theater_idx));

CREATE TABLE user_info(
info_idx INT NOT NULL AUTO_INCREMENT,
user_id VARCHAR(10),
genre_idx INT NOT NULL,
birth INT,
gender VARCHAR(5),
email VARCHAR(32),
PRIMARY KEY(info_idx),
FOREIGN KEY(genre_idx) REFERENCES movie_genre(genre_idx),
INDEX user_index(user_id));

CREATE TABLE user_login(
user_idx INT NOT NULL AUTO_INCREMENT,
user_id VARCHAR(10),
user_pw VARCHAR(20),
PRIMARY KEY(user_idx),
FOREIGN KEY(user_idx) REFERENCES user_info(info_idx));

CREATE TABLE user_review(
review_idx INT NOT NULL AUTO_INCREMENT,
user_idx INT,
user_id VARCHAR(10),
movie_idx INT NOT NULL,
movie_title VARCHAR(64),
movie_rating DOUBLE,
movie_review VARCHAR(200),
PRIMARY KEY(review_idx),
FOREIGN KEY(user_idx) REFERENCES user_info(info_idx),
FOREIGN KEY(movie_idx) REFERENCES movie_info(movie_idx),
INDEX movie_index(movie_idx));
