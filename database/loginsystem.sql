CREATE TABLE IF NOT EXISTS `users` (
    user_id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user_first varchar(255) NOT NULL,
    user_last varchar(255) NOT NULL,
    user_email varchar(255) NOT NULL,
    user_uid varchar(255) NOT NULL,
    user_pwd varchar(255) NOT NULL
);

INSERT INTO `users` (user_first, user_last, user_email, user_uid, user_pwd)
VALUES ('Eben', 'Vosloo', 'ebenvosloo2001@gmail.com', 'Admin', 'admin');