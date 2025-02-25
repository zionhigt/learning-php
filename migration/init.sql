SET FOREIGN_KEY_CHECKS=0;

DROP TABLE books;
CREATE TABLE IF NOT EXISTS books (
    id int unsigned not null auto_increment primary key,
    name char(128) not null,
    description char(255) not null,
    date TIMESTAMP,
    status char(24) not null
) ENGINE=InnoDB;

DROP TABLE roles;
CREATE TABLE IF NOT EXISTS roles (
    id int unsigned not null auto_increment primary key UNIQUE,
    name char(128) not null UNIQUE,
    created_date TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO roles (name) VALUES ("admin");
INSERT INTO roles (name) VALUES ("users"); 

DROP TABLE users;
CREATE TABLE IF NOT EXISTS users (
    id int unsigned not null auto_increment primary key,
    name char(128) not null UNIQUE,
    password char(255) not null,
    created_date TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP,
    last_connected TIMESTAMP,
    role_id int unsigned,
    CONSTRAINT fk_role_id
        FOREIGN KEY (role_id)
            REFERENCES roles(id)
            ON DELETE SET NULL
        
) ENGINE=InnoDB;

INSERT INTO users (name, password, role_id) VALUES (
    "Admin",
    "azerty",
    (select id from roles where name = 'admin')
);

insert into books (name, description, status, date) VALUES ('Harry Potter à l\'école des sorciers', 'Tout commence dans un placard à balais', 'read', FROM_UNIXTIME(1271704115));
insert into books (name, description, status, date) VALUES ('1984', 'Big Brother vous surveille...', 'progress', FROM_UNIXTIME(1251154972));
insert into books (name, description, status, date) VALUES ('Le Seigneur des Anneaux : La Communauté de l\'Anneau', 'Un anneau pour les gouverner tous...', 'noread', FROM_UNIXTIME(1205957295));

SET FOREIGN_KEY_CHECKS=1;