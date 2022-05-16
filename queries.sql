INSERT INTO user (dt_registered, password_hash, avatar_path, email) VALUES ('01.01.2005', 'a1a1a1', 'avt_1.jpeg', 'user@email.ru'); -- 1
INSERT INTO user (dt_registered, password_hash, avatar_path, email) VALUES ('01.02.2005', 'a2a2a2', 'avt_2.jpeg', 'user_2@email.ru'); -- 2
INSERT INTO user (dt_registered, password_hash, avatar_path, email) VALUES ('01.03.2005', 'a3a3a3', 'avt_3.jpeg', 'user_3@email.ru'); -- 3



INSERT INTO project (project_name, user_id) VALUES ('Входящие', 1);
INSERT INTO project (project_name, user_id) VALUES ('Учеба', 2);
INSERT INTO project (project_name, user_id) VALUES ('Работа', 3);
INSERT INTO project (project_name, user_id) VALUES ('Домашние дела', 3);
INSERT INTO project (project_name, user_id) VALUES ('Авто', 2);



INSERT INTO task (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Собеседование в IT компании', '01.12.2019', false, 1, 1);
INSERT INTO task (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Выполнить тестовое задание', '25.12.2019', false, 2, 2);
INSERT INTO task (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Сделать задание первого раздела', '21.12.2019', true, 3, 3);
INSERT INTO task (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Встреча с другом', '22.12.2019', false, 3, 4);
INSERT INTO task (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Заказать пиццу', null, false, 2, 5);





-- получить список из всех проектов для одного пользователя:
SELECT project_name FROM project WHERE user_id = 2; 

-- получить список из всех задач для одного проекта:
SELECT task_name FROM task WHERE project_id = 3; 

-- пометить задачу как выполненную:
UPDATE task SET status_ready = 1 WHERE id = 1; 

-- обновить название задачи по её идентификатору:
UPDATE task SET task_name = 'Новое название' WHERE id = 5; 