CREATE DATABASE pc_master;
USE pc_master;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) DEFAULT 'default.jpg',
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO categories (name) VALUES ('CPU'), ('GPU'), ('RAM');

INSERT INTO products (name, description, price, category_id, image) VALUES
('Intel Core i9-14900K', '24 nuclee, 6.0 GHz', 12500.00, 1, 'cpu'),
('NVIDIA RTX 4080', '16GB GDDR6X', 24000.00, 2, 'gpu'),
('Kingston Fury 32GB', 'DDR5 6000MHz', 3200.00, 3, 'ram');

INSERT INTO users (username, password) VALUES ('admin', 'admin123');


CREATE USER 'pc_user'@'localhost' IDENTIFIED BY 'pc_pass123';

GRANT ALL PRIVILEGES ON pc_master.* TO 'pc_user'@'localhost';

FLUSH PRIVILEGES;

SHOW GRANTS FOR 'pc_user'@'localhost';

EXIT;
