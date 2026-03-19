CREATE DATABASE lab_web;
USE lab_web;
-- =====================
-- USERS
-- =====================
CREATE TABLE users (
    user_id INT IDENTITY(1,1) PRIMARY KEY,
    user_name VARCHAR(25) NOT NULL,
    user_email VARCHAR(55) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    updated_at DATETIME,
    created_at DATETIME
);

INSERT INTO users (user_name, user_email, user_pass, created_at) VALUES
('minh', 'minh@gmail.com', '123', GETDATE()),
('anh', 'anh@gmail.com', '123', GETDATE()),
('hieu', 'hieu@yahoo.com', '123', GETDATE()),
('long', 'long@gmail.com', '123', GETDATE()),
('mai', 'mai@gmail.com', '123', GETDATE()),
('trung', 'trung@gmail.com', '123', GETDATE()),
('linh', 'linh@yahoo.com', '123', GETDATE()),
('tuan', 'tuan@gmail.com', '123', GETDATE()),
('khanh', 'khanh@gmail.com', '123', GETDATE()),
('dung', 'dung@yahoo.com', '123', GETDATE());


-- =====================
-- PRODUCTS
-- =====================
CREATE TABLE products (
    product_id INT IDENTITY(1,1) PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_price FLOAT NOT NULL,
    product_description NVARCHAR(MAX) NOT NULL,
    updated_at DATETIME,
    created_at DATETIME
);

INSERT INTO products (product_name, product_price, product_description, created_at) VALUES
('Samsung Galaxy S23', 20000000, N'Điện thoại Samsung', GETDATE()),
('iPhone 14', 25000000, N'Điện thoại Apple', GETDATE()),
('Macbook Pro', 40000000, N'Laptop Apple', GETDATE()),
('Samsung TV', 15000000, N'Tivi Samsung', GETDATE()),
('Dell Laptop', 18000000, N'Laptop Dell', GETDATE()),
('AirPods Pro', 5000000, N'Tai nghe Apple', GETDATE()),
('Samsung Tablet', 10000000, N'Máy tính bảng Samsung', GETDATE());


-- =====================
-- ORDERS
-- =====================
CREATE TABLE orders (
    order_id INT IDENTITY(1,1) PRIMARY KEY,
    user_id INT NOT NULL,
    updated_at DATETIME,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO orders (user_id, created_at) VALUES
(1, GETDATE()),
(1, GETDATE()),
(2, GETDATE()),
(3, GETDATE()),
(4, GETDATE()),
(5, GETDATE()),
(1, GETDATE()),
(2, GETDATE());


-- =====================
-- ORDER_DETAILS
-- =====================
CREATE TABLE order_details (
    order_detail_id INT IDENTITY(1,1) PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    updated_at DATETIME,
    created_at DATETIME,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

INSERT INTO order_details (order_id, product_id, created_at) VALUES
(1, 1, GETDATE()),
(1, 2, GETDATE()),
(2, 3, GETDATE()),
(2, 4, GETDATE()),
(3, 1, GETDATE()),
(3, 5, GETDATE()),
(4, 2, GETDATE()),
(5, 6, GETDATE()),
(6, 7, GETDATE()),
(7, 1, GETDATE()),
(7, 2, GETDATE()),
(7, 3, GETDATE()),
(8, 4, GETDATE());