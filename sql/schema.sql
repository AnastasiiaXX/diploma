CREATE DATABASE IF NOT EXISTS task_force
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;

USE task_force;

CREATE TABLE locations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    latitude DECIMAL(10, 7) NOT NULL,
    longitude DECIMAL(11, 7) NOT NULL
);

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL UNIQUE,
    symbol_code VARCHAR(50) UNIQUE
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NULL,
    email VARCHAR(55) NOT NULL UNIQUE,
    birthday DATETIME,
    avatar VARCHAR(128),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) NOT NULL DEFAULT 'free',
    phone_number CHAR(11),
    telegram_name VARCHAR(128),
    about VARCHAR(255),
    failed_tasks INT NOT NULL DEFAULT 0,
    auth_key VARCHAR(64) NOT NULL DEFAULT '',
    yandex_id BIGINT UNIQUE NULL,
    location_id INT NOT NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id)
);

CREATE TABLE user_specialties (
    user_id INT NOT NULL,
    specialty_id INT NOT NULL,
    PRIMARY KEY (user_id, specialty_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    cost INT,
    date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_end DATE,
    status ENUM('new','in_progress','completed','canceled','failed') DEFAULT 'new',
    employer_id INT NOT NULL,
    worker_id INT,
    location_id INT,
    category_id INT,
    FOREIGN KEY (employer_id) REFERENCES users(id),
    FOREIGN KEY (worker_id) REFERENCES users(id),
    FOREIGN KEY (location_id) REFERENCES locations(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE files (
    id INT PRIMARY KEY AUTO_INCREMENT,
    path VARCHAR(255) NOT NULL,
    task_id INT,
    FOREIGN KEY (task_id) REFERENCES tasks(id)
);

CREATE TABLE responses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cost INT,
    comment TEXT,
    status VARCHAR(16) NOT NULL DEFAULT 'new',
    worker_id INT,
    task_id INT,
    FOREIGN KEY (task_id) REFERENCES tasks(id),
    FOREIGN KEY (worker_id) REFERENCES users(id)
);

CREATE TABLE reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    text VARCHAR(128) NOT NULL,
    score INT NOT NULL,
    employer_id INT,
    worker_id INT,
    task_id INT,
    FOREIGN KEY (task_id) REFERENCES tasks(id),
    FOREIGN KEY (worker_id) REFERENCES users(id)
);

-- Категории
INSERT INTO categories (title, symbol_code) VALUES ('Курьерские услуги', 'courier');
INSERT INTO categories (title, symbol_code) VALUES ('Уборка', 'clean');
INSERT INTO categories (title, symbol_code) VALUES ('Переезды', 'cargo');
INSERT INTO categories (title, symbol_code) VALUES ('Компьютерная помощь', 'neo');
INSERT INTO categories (title, symbol_code) VALUES ('Ремонт квартирный', 'flat');
INSERT INTO categories (title, symbol_code) VALUES ('Ремонт техники', 'repair');
INSERT INTO categories (title, symbol_code) VALUES ('Красота', 'beauty');
INSERT INTO categories (title, symbol_code) VALUES ('Фото', 'photo');
