CREATE DATABASE wikiglobe;
CREATE table user(
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    email varchar(100),
    password varchar(255),
    role varchar(100),
);
CREATE table category(
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(255), 
);
CREATE table wiki(
     id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
     title varchar(255),
     content varchar(255),
     user_id INT,
     FOREIGN KEY (user_id) REFERENCES user(id),
     category_id INT,
     FOREIGN KEY (category_id) REFERENCES category(id),                    

);
CREATE table tag(
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(255), 
);
CREATE table tag_wiki(
    wiki_id INT,
    FOREIGN KEY (wiki_id) REFERENCES wiki(id),
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tag(id),
);
