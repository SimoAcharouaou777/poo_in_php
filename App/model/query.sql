CREATE TABLE role (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) UNIQUE
);
INSERT INTO role (name) VALUES ( "user");
INSERT INTO role (name) VALUES ("admin");

CREATE TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) UNIQUE ,
    password varchar(300) ,
    role_id int ,
    FOREIGN KEY (role_id) REFERENCES role(id)
);


