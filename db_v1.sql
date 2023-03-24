CREATE DATABASE lessons CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;

use lessons;

CREATE TABLE role (
	id INT NOT NULL AUTO_INCREMENT,
	role VARCHAR(20) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=INNODB;

INSERT INTO role (role) VALUES ('Administrador');
INSERT INTO role (role) VALUES ('Usuario');

CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT,
	role_id INT NOT NULL,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(100) NOT NULL,
	status VARCHAR(20) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	CONSTRAINT fk_role
	FOREIGN KEY (role_id)
	REFERENCES role (id)
)ENGINE=INNODB;

INSERT INTO users (role_id, first_name, last_name, email, password, status) VALUES (1, 'Nilton', 'Peña', 'admin@g.com', '12', 'Activo');
INSERT INTO users (role_id, first_name, last_name, email, password, status) VALUES (2, 'Cesar', 'Martinez', 'usuario@g.com', '12', 'Activo');


CREATE TABLE students (
	id INT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	learning VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	country VARCHAR(20) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=INNODB;

INSERT INTO students (first_name, last_name, learning, email, phone, country) VALUES ('Wilson', 'Muñoz', 'PHP', 'wilson@stud.com', '+54 3231 713', 'Argentina');

CREATE TABLE lessons (
	id INT NOT NULL AUTO_INCREMENT,
	student_id INT NOT NULL,
	lesson_number INT NOT NULL,
	language VARCHAR(50) NOT NULL,
	start_time DATETIME DEFAULT CURRENT_TIMESTAMP,
	end_time DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	CONSTRAINT fk_student
	FOREIGN KEY (student_id)
	REFERENCES students (id)
)ENGINE=INNODB;

INSERT INTO lessons (student_id, lesson_number, language) VALUES (1, 01, 'PHP');