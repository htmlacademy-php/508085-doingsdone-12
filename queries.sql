INSERT INTO projects SET project_name = 'Входящие', user_id = 1;
INSERT INTO projects SET project_name = 'Учеба', user_id = 2;
INSERT INTO projects SET project_name = 'Работа', user_id = 3;
INSERT INTO projects SET project_name = 'Домашние дела', user_id = 4;
INSERT INTO projects SET project_name = 'Авто', user_id = 5;

INSERT INTO users (dt_registered, password_hash, avatar_path, email) VALUES ('01.01.2005', 'a1a1a1', 'path/path/path', 'user@email.ru');
INSERT INTO users (dt_registered, password_hash, avatar_path, email) VALUES ('01.02.2005', 'a2a2a2', 'path_2/path_2/path_2', 'user_2@email.ru');
INSERT INTO users (dt_registered, password_hash, avatar_path, email) VALUES ('01.03.2005', 'a3a3a3', 'path_3/path_3/path_3', 'user_3@email.ru');



INSERT INTO tasks (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Собеседование в IT компании', '01.12.2019', false, 1, 1);
INSERT INTO tasks (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Выполнить тестовое задание', '25.12.2019', false, 2, 2);
INSERT INTO tasks (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Сделать задание первого раздела', '21.12.2019', true, 3, 3);
INSERT INTO tasks (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Встреча с другом', '22.12.2019', false, 4, 4);
INSERT INTO tasks (task_name, dt_deadline, status_ready, user_id, project_id) VALUES ('Заказать пиццу', null, false, 5, 5);






SELECT project_name FROM projects where user_id = 2; -- получить список из всех проектов для одного пользователя

SELECT task_name FROM tasks where project_id = 3; -- получить список из всех задач для одного проекта

UPDATE tasks SET status_ready = true WHERE task_name = 'Собеседование в IT компании'; -- пометить задачу как выполненную

UPDATE tasks SET task_name = 'Новое название' WHERE id = 5; -- обновить название задачи по её идентификатору

