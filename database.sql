DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS tasks;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    avatar VARCHAR(255) NULL
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('check class announcements', 'completed', CURRENT_DATE - INTERVAL 1 DAY, CURRENT_TIMESTAMP),
('organize project files', 'completed', CURRENT_DATE - INTERVAL 1 DAY, CURRENT_TIMESTAMP),
('finish the homepage', 'in progress', CURRENT_DATE, CURRENT_TIMESTAMP),
('review the task list', 'pending', CURRENT_DATE, CURRENT_TIMESTAMP),
('test all pages', 'pending', CURRENT_DATE, CURRENT_TIMESTAMP),
('update the readme', 'pending', CURRENT_DATE + INTERVAL 1 DAY, CURRENT_TIMESTAMP),
('upload the project', 'pending', CURRENT_DATE + INTERVAL 1 DAY, CURRENT_TIMESTAMP),
('check the hosted site', 'pending', CURRENT_DATE + INTERVAL 1 DAY, CURRENT_TIMESTAMP);

INSERT INTO users (username, full_name, email, created_at)
VALUES ('dustin', 'Dustin', 'dustin@example.com', CURRENT_TIMESTAMP);
