CREATE DATABASE doinngsdone DEFAULT CHARACTER SET UTF -8 DEFAULT COLLATE utf8_genetal_ci USE doinngsdone;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_registered NOT NULL TIMESTAMP;
    password_hash NOT NULL VARCHAR(128),
    avatar_path VARCHAR(128),
    project_name NOT NULL VARCHAR(128),
    email VARCHAR(128)
);

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    project_name NOT NULL VARCHAR(128),
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    project_id NOT NULL INT,
    task_name NOT NULL VARCHAR(128),
    status_ready TINYINT DEFAULT 0,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dt_deadline TIMESTAMP
);

CREATE INDEX index_user ON users(id, dt_registered, email);

CREATE INDEX index_project ON projects(id, project_name);

CREATE INDEX index_tasks ON projects(id, task_name, dt_add, dt_deadline);