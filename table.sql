-- admin database
-- user table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- categories 
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR(255) NOT NULL,
    status TINYINT NOT NULL
);

-- products
CREATE TABLE products (
    p_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    MRP INT NOT NULL,
    price INT NOT NULL,
    qty INT NOT NULL,
    img VARCHAR(255) NOT NULL,
    desciption VARCHAR(255) NOT NULL
);


---shop
CREATE TABLE IF NOT EXIST products {
    product_id int(11) NOT NULL AUTO_INCREMENT,
    product_name varchar(100) NOT NULL,
    product_category varchar(100) NOT NULL,
    product_description varchar(255) NOT NULL,
    product_image varchar(255) NOT NULL,
    product_image2 varchar(255) NOT NULL,
    product_image3 varchar(255) NOT NULL,
    product_image4 varchar(255) NOT NULL,
    product_price decimal(6,2) NOT NULL,
    product_special_offer integer(2) NOT NULL,
    PRIMARY KEY (product_id)
} ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXIST orders {
    order_id int(11) NOT NULL AUTO_INCREMENT,
    order_cost deciaml(6,2) NOT NULL,
    order_status varchar(255) NOT NULL DEFAULT 'on_hold',
    user_id int(11) NOT NULL,
    user_phone int(11) NOT NULL,
    user_city varchar(255) NOT NULL,
    user_address varchar(255) NOT NULL,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (order_id)
} ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXIST order_items {
    item_id int(11) NOT NULL AUTO_INCREMENT,
    order_id int(11) NOT NULL,
    product_id varchar(255) NOT NULL,
    product_name varchar(255) NOT NULL,
    product_image varchar(255) NOT NULL,
    user_id int(11) NOT NULL,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (item_id)
} ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXIST users{
    user_id int(11) NOT NULL AUTO_INCREMENT,
    user_name varchar(100) NOT NULL,
    user_email varchar(100) NOT NULL,
    user_password varchar(100) NOT NULL,
    PRIMARY KEY(user_id),
    UNIQUE KEY UX_Contraint (user_email)
} ENGINE=InnoDB DEFAULT CHARSET=latin1;

SELECT 
    products.p_id,
    categories.cat_name,
    products.product_name,
    products.MRP,
    products.price,
    products.img,
    products.description,
    products.statuss
FROM products
INNER JOIN categories ON products.category_name = categories.id;


--user register
CREATE TABLE user_register (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)  NOT NULL,
    email VARCHAR(100)  NOT NULL,
    password VARCHAR(100)  NOT NULL
);

