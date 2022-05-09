CREATE DATABASE doinngsdone DEFAULT CHARACTER SET UTF -8 DEFAULT COLLATE utf8_genetal_ci USE doinngsdone;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_registered NOT NULL TIMESTAMP;
    password_hash NOT NULL VARCHAR(128),
    avatar_path VARCHAR(128),
    project_name NOT NULL CHAR(64),
    email VARCHAR(128)
);


CREATE TABLE projects (
    user_id INT PRIMARY KEY,
    id INT AUTO_INCREMENT NOT NULL,
    project_name NOT NULL CHAR(64),
    user_connect TINYINT DEFAULT 1
);

CREATE TABLE tasks (
    user_id INT PRIMARY KEY,
    id INT AUTO_INCREMENT NOT NULL ,
    project_id NOT NULL INT,
    task_name NOT NULL VARCHAR(128),
    status_ready TINYINT DEFAULT 0,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dt_deadline TIMESTAMP
);