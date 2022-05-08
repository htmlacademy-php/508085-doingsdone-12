CREATE DATABASE doinngsdone DEFAULT CHARACTER SET UTF -8 DEFAULT COLLATE utf8_genetal_ci USE doinngsdone;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    dt_registered NOT NULL TIMESTAMP;
    password_user CHAR(64),
    avatar_path TEXT,
    project_name CHAR(64),
    email email VARCHAR(128)
);

CREATE TABLE projects (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    project_name NOT NULL CHAR(64),
    user_connect TINYINT DEFAULT 'Yes'
);

CREATE TABLE tasks (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    project_name NOT NULL CHAR(64),
    task_name NOT NULL VARCHAR(128),
    status_ready TINYINT DEFAULT 'No',
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dt_deadline TIMESTAMP
);